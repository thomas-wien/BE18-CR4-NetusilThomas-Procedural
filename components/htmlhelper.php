<?php

function head($titel = " | Thomas ")
{
  echo '<!DOCTYPE html> 
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <meta name="author" content="Thomas Netusil">
      <meta name="description" content="CodeReview 4">
      <title>The Big Library Web Application' . $titel . '</title>
      <link href="favicon.ico" rel="icon">
    </head>
    <body>
    <header class="position-relative">
    <h1
      class="vw-auto d-block display-5 position-absolute top-50 start-50 translate-middle text-center text-white bg-dark  bg-opacity-75 px-4 py-5">
      The Library</h1>
    <img style="object-fit: cover; object-position: center; width: 100vw; height: 35vh; margin-bottom: 1rem;"
      src="pictures/heroImage.jpg" alt="Library">
  </header>';
}

function htmlend()
{
  echo ' <footer class="container-fluid mt-5 bg-dark text-white text-center ">
  
  <p class="fs-6 m-2 p-2">&copy; 2023 Copyright Thomas Netusil  <a href="https://https://github.com/thomas-wien/BE18-CR4-NetusilThomas-Procedural.git" target="_blank" rel="noopener noreferrer">Github Procedual Version</a> 
  <a href="https://github.com/thomas-wien/BE18-CR4-NetusilThomas_OOP.git" target="_blank" rel="noopener noreferrer">Github OOP Version</a></p>
</footer>
</body>
  </html>';
}
