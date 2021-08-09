@extends('../layouts.include-site')
@section('title', 'تفاصيل الدراسة') 
@section('content')
<div class="page-title-area">
  <div class="d-table">
    <div class="d-table-cell">
      <div class="container">
        <div class="title-item">
          <h2 style="color: white;">تفاصيل الدراسة</h2>
          <ul>
            <li>
              <a href="index.html">الرئيسة</a>
            </li>
            <li>
              <i class='bx bx-chevrons-right'></i>
            </li>
            <li>
              <span>التفاصيل</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="blog-details-area ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="details-item" style="text-align: justify;">
          <div class="details-img">
            <img src="{{asset('site-assets/img/service-details3.jpg')}}" alt="التفاصيل" style="border-radius: 20px !important;">
            <ul>
              <li>
                <i class='bx bx-user'></i>
                By: <a href="#">admin</a>
              </li>
              <li>
                <i class='bx bx-calendar-alt'></i>
                20 December, 2020
              </li>
              <li>
                <i class='bx bx-message-detail'></i>
                <a href="#">Comments (02)</a>
              </li>
            </ul>
            <h2>Know More About Our Clean Furniture And Tools</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
            <blockquote>
              "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti, est aperiam expedita asperiores rem corrupti quae a quo molestias optio iure sapiente nesciunt vitae. Fugit veritatis eos iure voluptates explicabo"
              <span>Tom Henry</span>
            </blockquote>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="widget-area">
          <div class="search widget-item">
            <form>
              <input type="text" class="form-control" placeholder="بحث ...">
              <button type="submit" class="btn">
              <i class='bx bx-search'></i>
              </button>
            </form>
          </div>
          <div class="tags widget-item">
            <h3>كلمات مفتاحية</h3>
            <ul>
              <li>
                <a href="#">Cleaner</a>
              </li>
              <li>
                <a href="#">Corporate</a>
              </li>
              <li>
                <a href="#">Agency</a>
              </li>
              <li>
                <a href="#">Office</a>
              </li>
              <li>
                <a href="#">Kitchen</a>
              </li>
              <li>
                <a href="#">Deep</a>
              </li>
              <li>
                <a href="#">Sanitizer</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection