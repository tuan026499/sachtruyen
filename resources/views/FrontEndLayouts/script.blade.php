<script type="text/javascript" >
  $('.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          nav:true,
          responsive:{
  0:{
      items:1
  },
  600:{
      items:3
  },
  1000:{
      items:5
  }
}
})
</script>
{{-- <script>
  $('select').on('change', function (e) {
      var link = $("option:selected", this).val();
      if (link) {
          location.href = link;
      }
  });
</script> --}}
{{-- tìm kiếm nâng cao --}}
<script type="text/javascript">
  $('#keywords').keyup(function(){
      var keywords = $(this).val();
      if(keywords !='' ){
          var _token = $('input[name="_token"]').val();
          $.ajax({
              url:"{{url('/timkiem-ajax')}}",
              method:"POST",
              data:{keywords:keywords,_token:_token},
              success:function(data){
                  $('#search_ajax').fadeIn();
                  $('#search_ajax').html(data);
              }
          });
      }else{
          $('#search_ajax').fadeOut(); 
      }
  });


</script>
<script type="text/javascript">
  $('.select-chapter').on('change',function(){
      var url = $(this).val();
      // var  = select-chapter . giá trị của từng options
      if(url){
          //nếu url tồn tại
          window.location = url;
      }
      return false;
  });
  current_chapter();
  function current_chapter(){
       //lấy đưiongf dẫn hiện tại 
      var url   = window.location.href;
     
      $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
      
  }

</script>
<script>
var loadFile = function(event) {
  var output = document.getElementById('output');
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
  }
};
</script>

<div id="fb-root"></div>
<script type="text/javascript" src="{{ asset('js/image-uploader.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="NDWdUKb9"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript">

  function ChangeToSlug()
      {
          var slug;
       
          //Lấy text từ thẻ input title 
          slug = document.getElementById("slug").value;
          slug = slug.toLowerCase();
          //Đổi ký tự có dấu thành không dấu
              slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
              slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
              slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
              slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
              slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
              slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
              slug = slug.replace(/đ/gi, 'd');
              //Xóa các ký tự đặt biệt
              slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
              //Đổi khoảng trắng thành ký tự gạch ngang
              slug = slug.replace(/ /gi, "-");
              //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
              //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
              slug = slug.replace(/\-\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-/gi, '-');
              slug = slug.replace(/\-\-/gi, '-');
              //Xóa các ký tự gạch ngang ở đầu và cuối
              slug = '@' + slug + '@';
              slug = slug.replace(/\@\-|\-\@|\@/gi, '');
              //In slug ra textbox có id “slug”
          document.getElementById('convert_slug').value = slug;
      }
       
 
 
 
 </script>
 <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
 <script type="text/javascript"> 
  CKEDITOR.replace( 'noidung_editor' );
     $('#noidung_editor').ckeditor();
 </script>
 {{-- hiển thị ảnh form thêm mới --}}
 {{-- <script>
     var loadFile = function(event) {
       var output = document.getElementById('output');
       output.src = URL.createObjectURL(event.target.files[0]);
       output.onload = function() {
         URL.revokeObjectURL(output.src) // free memory
       }
     };
   </script> --}}
   <script type="text/javascript">
    $('#image').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });
  </script>
   <!--------------Lưu truyện yêu thích bằng local storage --------------------->
  