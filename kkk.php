<?php

require_once 'controllers/authController.php';
if (!isset($_SESSION['id'])){
  header('location: login.php');
  exit();
}
?>
 <!doctype html>
 <html>
 
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
   <link rel="stylesheet" href="styles.css">
   <style>
     /* Center the container div */
     body, html {
       height: 100%;
       display: flex;
       justify-content: center;
       align-items: center;
     }
   </style>
 </head>
 
 <body>
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

 <div class="flex flex-col space-y-4 items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">

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
      <div class="flex space-x-4 <?php echo $_SESSION['alert-class']; ?> ">
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
      <h3 class="mb-4 space-x-4">Welcome, <?php echo $_SESSION['username']; ?></h3> 

      <a href="home.php?logout=1" class="space-x-4 text-red-400 dark:text-red-400">logout</a>
      <br>

      <?php if(!$_SESSION['verified']): ?>
     <div class="mt-4 space-x-4 flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
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
      <a href="#" class="w-full space-x-4 text-center mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        I am verified
      </a>
      <?php endif; ?>



   </div>

   
 </body>
 
 </html>
