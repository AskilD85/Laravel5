<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Model\Role;
use App\Events\PostHasViewed;
use Gate;
use Auth;
class IndexController extends Controller
{
    protected $title;
    
    
    public function __construct() {
        $this->title= "Админка";
        $this->message= "";
        $this->middleware('auth');
 
       

    }
    
    public function index() {
        $news = Article::select('id','title','text','user_id')->get();
        return view('home')->with(['title'=>$this->title,'news'=>$news]);
    }
    
    public function show($id) {
        //$article = Article::find($id);
        
        $new = Article::select(['id','title','text','user_id','updated_at','created_at','visit_count','images','file'])->where('id',$id)->first();
        $user = User::select(['name'])->where('id',$new['user_id'])->first();
        //$user=User::find($new['user_id']);
        
        $post = Article::findOrFail($id);
        event('postHasViewed', $post);
        return view('new-content')->with(['title'=>$this->title,'new'=>$new,'user'=>$user,'post'=>$post]);
        
    }
    
    public function news() {
        //$article = Article::find($id);
        
        
        $this->title="Список всех новостей";
        $news = Article::select('id','title','text','user_id','images')->get();
        return view('news')->with(['title'=>$this->title,'news'=>$news]);
    }
    
    
    
    public function delete(Article $new ){
        //$new_tmp = \App\Article::where('id',$new)->first();
        $user = Auth::user();
        
        if((Gate::allows('edit-new',$new))){
            if($new->delete()){
                return redirect('/news')->with('status','Новость удалена');
            }
        }
          else{
            return redirect()->back()->withErrors(['status'=>'У вас нет прав для удаления данной записи']);
        }  
    }
    
    
    
    
    //добавление новости
    public function add(Request $request) {
        $this->title="Добавление новости";
        //return view('add-new')->with(['title'=>$this->title]);
        if($request->isMethod('post')){
            $input = $request->except('_token');
            $validator = Validator::make($input,[
                'title' => 'required|max:255',
                'text' => 'required', 
            ]);
            if($validator->fails()){
                return redirect()->route('AddNewGet')->withErrors($validator);
            }
            if($request->hasFile('images')){
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/img/',$input['images']);
                
            };
            if($request->hasFile('file')){
                $file = $request->file('file');
                $input['file'] = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/',$input['file']);
                
            };
            $new = new Article;
            
            $new->fill($input);
            
            if($new->save()){
                return redirect('/news')->with('status','Новость добавлена');
            }
        }
        return view('new-add')->with(['title'=>$this->title]);
    }
    
    
    
    
    
    //Редактирование новости
    public function edit(Article $new, Request $request) {
       
        $user = Auth::user();
         //проверка разрешения на редактирование новости
        if((Gate::allows('edit-new',$new))){
            
            //проверка отправки формы для редактирования
        if($request->isMethod('post')){
            $input = $request->except('_token');
            
            $validator = Validator::make($input,[
                'title'=> 'required|max:255',
                'text'=>'required'
            ]);
            if($validator->fails()){
                return redirect()->route('newEdit',['new'=>$new['id']])->withErrors($validator);
            }
            if($request->hasFile('images')){
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/img/',$input['images']);
                
            };
            if($request->hasFile('file')){
                $file = $request->file('file');
                $input['file'] = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/',$input['file']);
                
            };
            $new->fill($input);
            //dd($new->id);
            if($new->update()){
                return redirect('/new/'.$new->id)->with('status','Новость отредактирована');
            }
        }
        
        //вывод старых данных для формы редактирования
        $old = $new->toArray();//превращаем старые данные в массив
        if(view()->exists('new-edit')){
            $data = [
                'title'=>'Редактирование новости - '.$old['title'],
                'data'=>$old
                
                    ];
        
            return view('new-edit',$data);
            }
        }else{
            return redirect()->back()->withErrors(['status'=>'У вас нет прав для редактирования данной записи']);
        }
    
    }
    public function downloadFile($id,Request $request) {
        
            $dl = Article::find($id);
            if($dl->file){
                $file=$dl->file;
                //dd($file);
                return  response()->download(public_path('uploads/'.$file));
            }else{
            return redirect()->back()->withErrors(['status'=>'Файла нет на сервере']);
        }
       
    }
}
