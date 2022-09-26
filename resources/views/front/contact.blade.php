@extends('layouts.front')
@section('content')
<style>
   @font-face { font-family: NotoColorEmojiLimited; unicode-range: U+1F1E6-1F1FF; src: url(https://raw.githack.com/googlefonts/noto-emoji/main/fonts/NotoColorEmoji.ttf); } 
   select { font-family: 'NotoColorEmojiLimited', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; }
</style>
<div class="clearfix">
   <section class="footer_get_touch_outer">
      <div class="container">
         <div class="footer_get_touch_inner grid-70-30">
            <div class="colmun-70 get_form">
               <div class="get_form_inner">
                  <div class="get_form_inner_text">
                     <h3>Get In Touch</h3>
                  </div>
                  <form action="{{route('submitcontact')}}" method="POST">
                     @csrf
                     <div class="grid-50-50">
                        <input type="text" placeholder="Name" name="name" required>
                        <input type="email" placeholder="Email" name="email" required>
                        <select name="fcode" class="form-select text-dark sel" id="theselects" aria-label="Default select example" name="code" required="">
                           <option value="">Country code</option>
                           -->
                           <option value="us" id="us" name="1"> US+1
                              ðŸ‡ºðŸ‡¸
                           </option>
                           <option value="ca" id="ca" name="2"> CA+1        ðŸ‡¨ðŸ‡¦</option>
                           <option value="uk" id="uk" name="3"> UK+44 ðŸ‡¬ðŸ‡§</option>
                           <option value="au" id="au" name="4"> AU+61 ðŸ‡³ðŸ‡¿</option>
                           <option value="nz" id="nz" name="5"> NZ+64 ðŸ‡¦ðŸ‡º</option>
                        </select>
                        <input type="tel" placeholder="Phone" name="phone" required>
                     </div>
                     <div class="grid-full">
                        <textarea placeholder="message" cols="30" rows="10" name="message"></textarea>
                        <input type="submit"  value="Submit">
                     </div>
                  </form>
               </div>
            </div>
            <div class="colmun-30 get_say_form">
               <ul class="get_say_info_sec">
                  <li>
                     <i class="fa fa-envelope"></i>
                     <a href="mailto:">support@setupguidebook.com</a>
                  </li>
                  <li>
                     <i class="fa fa-phone"></i>
                     <a href="##">+1 021 548 7595</a>
                  </li>
               </ul>
               <ul class="get_say_social-icn">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
               </ul>
            </div>
         </div>
      </div>
   </section>
</div>
@stop
