<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Document</title>
<link rel="stylesheet" href="./View/Css/style.css">
<style>
    .menu li {
  display: inline-block;
}

.menu a {
  text-decoration: none;
  padding: 10px;
}

.sub-menu {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
}

.menu li:hover .sub-menu {
  display: block;
}

.sub-menu li {
  display: block;
}

.sub-menu a {
  color: #333;
  padding: 5px 10px;
}

.sub-menu a:hover {
  background-color: #ccc;
}
</style>