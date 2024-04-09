<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible"
         content="IE=edge">
      <meta name="viewport"
         content="width=device-width,
         initial-scale=1.0">
      <title>Lecture Sceduling </title>
      <link rel="stylesheet"
         href="{{ asset('css/style.css')}}">
      <link rel="stylesheet"
         href="{{asset('css/responsive.css')}}">
   </head>
   <body>
      <!-- for header part -->
      <header>
         <div class="logosec">
            <div class="logo">Lecture Sceduling</div>
            <img src=
               "https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
               class="icn menuicn"
               id="menuicn"
               alt="menu-icon">
         </div>
         <div class="searchbar">
            <input type="text"
               placeholder="Search">
            <div class="searchbtn">
               <img src=
                  "https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                  class="icn srchicn"
                  alt="search-icon">
            </div>
         </div>
         <div class="message">
            <div class="circle"></div>
            <img src=
               "https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png"
               class="icn"
               alt="">
            <div class="dp">
               <img src=
                  "https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                  class="dpicn"
                  alt="dp">
            </div>
         </div>
      </header>
      <div class="main-container">
         <div class="navcontainer">
            <nav class="nav">
               <div class="nav-upper-options">
                <a href="{{route('dashboard1')}}">
                  <div class="nav-option option1">
                     <img src=
                        "https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                        class="nav-img"
                        alt="dashboard">
                     <h4> Dashboard</h4>
                  </div>
                </a>
                  <a href="{{route('add-courses')}}">
                    <div class="option2 nav-option">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png" class="nav-img" alt="articles">
                        <h4> Add Courses</h4>
                    </div>
                </a>
                <a href="{{route('add-batch')}}">
                  <div class="nav-option option3">
                     <img src=
                        "https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                        class="nav-img"
                        alt="report">
                     <h4> Add Batches</h4>
                  </div>
                </a>
                <a style="text-decoration: none" href="{{route('view-instructor')}}">
                  <div class="nav-option option4">
                     <img src=
                        "https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
                        class="nav-img"
                        alt="institution">
                     <h4>Instructors List</h4>
                  </div>
                </a>
                <a href="{{route('add-schedule')}}">
                  <div class="nav-option option5">
                     <img src=
                        "https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                        class="nav-img"
                        alt="blog">
                     <h4> Schedule Lecture</h4>
                  </div>
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <a onclick="event.preventDefault(); this.closest('form').submit();" style="cursor: pointer;">
                    <div class="nav-option logout">
                        <img src=
                            "https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                            class="nav-img"
                            alt="logout">
                        <h4>Logout</h4>
                    </div>
                </a>
            </form>
               </div>
            </nav>
         </div>
         <script>
            // Get the current URL
            var currentUrl = window.location.href;

            // Select all navigation links
            var navLinks = document.querySelectorAll('.nav-option');

            // Loop through each navigation link
            navLinks.forEach(function(navLink) {
              // Check if the href attribute of the link matches the current URL
              if (navLink.href === currentUrl) {
                // If there's a match, add the 'active' class to the parent list item
                navLink.parentNode.classList.add('active');
              }
            });
          </script>
