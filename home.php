<?php

require_once 'controllers/authController.php';
if (!isset($_SESSION['id'])){
  header('location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./dist/output.css">
    <link rel="stylesheet" href="css.css">
    <!-- <link rel="stylesheet" href="./dist/input.css"> -->
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <!-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script> -->
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body class="">
    <header>
        <div class="navbar">
            <div class="logo"><a href="#">Web Dev Creative</a></div>
         <ul class="links">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Services</a></li>
            <li><a href="">Contact</a></li>
         </ul>
         <a href="#" class="action_btn">Get started</a>
         <div class="toggle_btn open">
            <ion-icon name="grid"></ion-icon>
        </div>   
        <div class="dropdown_menu">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Contact</a></li>
                <!-- Move the action_btn inside the dropdown menu -->
                <li><a href="#" class="action_btn">Get started</a></li>
            </ul>
        </div>

        </div>
    </header>
    <main class="hero">
        <div class=" max-w-sm p-6 bg-black border border-gray-200 rounded-lg shadow dark:bg-black dark:border-gray-700">

            <div class="flex flex-col space-y-4 items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-black dark:bg-black dark:text-green-400 dark:border-green-800" role="alert">
           
              <!-- <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
               <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                   <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                   </svg>
                         <div>
                     You are now logged in!
                   </div>
                 </div> -->
           
                 <?php if(isset($_SESSION['message'])): ?>
                 <div class="dark:bg-black flex space-x-4 <?php echo $_SESSION['alert-class']; ?> ">
                 <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                   <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                 </svg>
                 <!-- <span class="sr-only">Info</span> -->
                 <div>
                   <?php 
                   echo $_SESSION['message'];
                   unset($_SESSION['message']);
                   unset($_SESSION['alert-class']);
                    ?>
                 </div>
               </div>
             </div>
             <?php endif; ?>
                 <h3 class="mb-4 space-x-4 text-white">Welcome, <?php echo $_SESSION['username']; ?></h3> 
           
                 <a href="home.php?logout=1" class="space-x-4 text-red-400 dark:text-red-400">logout</a>
                 <br>
           
                 <?php if(!$_SESSION['verified']): ?>
                <div class="mt-4 space-x-4 flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-black dark:bg-black dark:text-yellow-300 dark:border-yellow-800" role="alert">
                   <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                   </svg>
                   <!-- <span class="sr-only">Info</span> -->
                   <div>
                       You need to verify your account.
                       Sign into your gmail account and click on the 
                       verification link we just emailed you at 
                       <strong> <?php echo $_SESSION['email']; ?></strong>
                   </div>
                 </div>
                 <?php endif; ?>
           
                 <?php if($_SESSION['verified']): ?>
                 <a href="#" class="w-full space-x-4 text-center mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                   I am verified
                 </a>
                 <?php endif; ?>
           
           
           
              </div>
    </main>
<!-- 
    <script>
        const toggleBtn = document.querySelector('.toggle_btn')
        const toggleBtnIcon = document.querySelector('.toggle_btn i')
        const dropDownMenu = document.querySelector('.dropdown_menu')

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('.open')
            const isOpen = dropDownMenu.classList.contains('.open')

            toggleBtnIcon.classList = isOpen
            ? 'grid'
            : 'close'
        }
    </script> -->
    <!-- <script>
        const toggleBtn = document.querySelector('.toggle_btn');
        const dropDownMenu = document.querySelector('.dropdown_menu');
        const toggleIcon = document.querySelector('.toggle_btn ion-icon');

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
            toggleIcon.setAttribute('name', dropDownMenu.classList.contains('open') ? 'close' : 'grid');
        };
    </script> -->
    <script>
        const toggleBtn = document.querySelector('.toggle_btn');
        const dropDownMenu = document.querySelector('.dropdown_menu');
        const toggleIcon = document.querySelector('.toggle_btn ion-icon');
    
        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
            toggleIcon.setAttribute('name', dropDownMenu.classList.contains('open') ? 'close' : 'grid');
        };
    
        // Function to close the dropdown menu when window width exceeds 992px
        function closeDropDownMenu() {
            dropDownMenu.classList.remove('open');
            toggleIcon.setAttribute('name', 'grid');
        }
    
     
    
      
    
        // Add event listener to close the dropdown menu when window width exceeds 992px
        window.addEventListener('resize', function() {
            if (window.innerWidth > 992) {
                closeDropDownMenu();
            }
        });
    </script>
    
</body>
</html>