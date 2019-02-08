@extends ('layouts.site') 

@section('content')
  <div class="container w">
    <div class="row">
      <br><br>
     
        @foreach ($news as $new)
            
           <div class="">
               
                <h4>{{ $new->title }}</h4>
                <p>{{ $new->text }}
                <a href="{{ route('NewShow',['id'=>$new->id]) }}" role="button">Подробнее</a>
                </p>
            </div> 
        @endforeach;
      
    </div>
    <!-- row -->
    <br>
    <br>
  </div>
  <!-- container -->

   <!-- PORTFOLIO SECTION -->
  <div id="dg">
    <div class="container">
      <div class="row centered">
        <h4>LATEST WORKS</h4>
        <br>
        <div class="col-lg-4">
          <div class="tilt">
            <a href="#"><img src="{{asset('img/p01.png')}}" alt=""></a>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="tilt">
            <a href="#"><img src="{{asset('img/p02.png')}}" alt=""></a>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="tilt">
            <a href="#"><img src="{{asset('img/p03.png')}}" alt=""></a>
          </div>
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </div>
  <!-- DG -->

  <!-- FEATURE SECTION -->
  <div class="container wb">
    <div class="row centered">
      <br><br>
      <div class="col-lg-8 col-lg-offset-2">
        <h4>WE CREATE FIRST CLASS DESIGN</h4>
        <p>By being true to the brand we represent, we elevate the audiences’ relationship to it. Like becomes love becomes a passion. Passion becomes advocacy. And we see the brand blossom from within, creating a whole story the audience embraces. That’s
          when the brand can truly flex its muscles.</p>
        <p><br/><br/></p>
      </div>
      <div class="col-lg-2"></div>
      <div class="col-lg-10 col-lg-offset-1">
        <img class="img-responsive" src="{{asset('img/munter.png')}}" alt="">
      </div>
    </div>
    <!-- row -->
  </div>
  <!-- container -->

  <div id="lg">
    <div class="container">
      <div class="row centered">
        <h4>OUR AWESOME CLIENTS</h4>
        <div class="col-lg-2 col-lg-offset-1">
          <img src="{{asset('img/c01.gif')}}" alt="">
        </div>
        <div class="col-lg-2">
          <img src="{{asset('img/c02.gif')}}" alt="">
        </div>
        <div class="col-lg-2">
          <img src="{{asset('img/c03.gif')}}" alt="">
        </div>
        <div class="col-lg-2">
          <img src="{{asset('img/c04.gif')}}" alt="">
        </div>
        <div class="col-lg-2">
          <img src="{{asset('img/c05.gif')}}" alt="">
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </div>
  <!-- dg -->

  <div id="r">
    <div class="container">
      <div class="row centered">
        <div class="col-lg-8 col-lg-offset-2">
          <h4>WE ARE STORYTELLERS. BRANDS ARE OUR SUBJECTS. DESIGN IS OUR VOICE.</h4>
          <p>We believe ideas come from everyone, everywhere. At BlackTie, everyone within our agency walls is a designer in their own right. And there are a few principles we believe—and we believe everyone should believe—about our design craft. These truths
            drive us, motivate us, and ultimately help us redefine the power of design.</p>
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </div>

  <!-- FOOTER -->
  <div id="f">
    <div class="container">
      <div class="row centered">
        <a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-dribbble"></i></a>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </div>
  <!-- Footer -->

  <!-- MODAL FOR CONTACT -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">contact us</h4>
        </div>
        <div class="modal-body">
          <div class="row centered">
            <p>We are available 24/7, so don't hesitate to contact us.</p>
            <p>
              Somestreet Ave, 987<br/> London, UK.<br/> +44 8948-4343<br/> contact@example.com
            </p>

            <form class="contact-form php-mail-form" role="form" action="contactform/contactform.php" method="POST">

              <div class="form-group">
                <label for="contact-name">Your Name</label>
                <input type="name" name="name" class="form-control" id="contact-name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="contact-email">Your Email</label>
                <input type="email" name="email" class="form-control" id="contact-email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="contact-subject">Subject</label>
                <input type="text" name="subject" class="form-control" id="contact-subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                <div class="validate"></div>
              </div>

              <div class="form-group">
                <label for="contact-message">Your Message</label>
                <textarea class="form-control" name="message" id="contact-message" placeholder="Your Message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>

              <div class="loading"></div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <div class="form-send">
                <button type="submit" class="btn btn-large">Send Message</button>
              </div>

            </form>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  @endsection