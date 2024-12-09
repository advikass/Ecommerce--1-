<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us Section</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        .header {
      display: flex;
      justify-content:space-between;
      align-items: center;
      background-color:white;
      border-radius: 5px;
      box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4);
    }
    
    .header .logo {
      background: white;
      font-size: 35px;
      margin-right:10px;
      font-family: 'Sriracha', cursive;
      color:#4f4747;
      text-decoration: none;
      margin-left: 30px;
    }


        body {
            background-color: #dee0e3;
        }

        .heading {
            text-align: center;
            margin-top: 25px;
        }

        .heading h1 {
            font-size: 50px;
            color: #092c60;
            margin-bottom: 10px;

        }

        .heading p {
            font-size: 20px;
            color: #666;
            margin-bottom: 50px;
        }

        .about-us {
            display: flex;
            align-items: center;
            width: 85%;
            margin: auto;
        }

        .about-us img {
            flex: 0 50%;
            max-width: 50%;
            height: auto;
        }

        .content {
            padding: 35px;
        }

        .content h2 {
            color: #36455c;
            font-size: 24px;
            margin: 15px 0px;
        }

        .content p {
            color: #666;
            font-size: 18px;
            line-height: 1.5;
            margin: 15px 0px;
        }

        .read-more-btn {
            display: inline-block;
            color: #fff;
            background-color: #0084ff;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .read-more-btn:hover {
            background-color: #006dd6;
        }

        @media(max-width:768px) {
            .about-us {
                flex-direction: column;
            }

            .about-us img {
                flex: 0 100%;
                max-width: 100%;
            }

            .content {
                flex: 0 100%;
                max-width: 100%;
                padding: 15px;
            }
        }
        .btn {
            
  background:linear-gradient(to right,#072c3f,#96d2f2);
}
nav ul {
     display:flex;
     justify-content: center;
     margin:1px 0 1px 0;
     list-style:none;
     background: white;
    }

    nav ul li{
     justify-content: center;
     display:inline-block;
     position:relative;
    }

    nav ul li a{
      margin-right: 20px;
      text-decoration:solid;
      font-size:large;
      font-weight: 550;
      color: #4f4747;
      padding: 20px 25px;
      display:block;
      text-align:center;
    }
  
    nav ul li a:hover{
      color:black;
      background-color:#C5C6D0;
    }
    
    </style>

</head>

<body>
    <header class="header">
        <a href="#" class="logo">Berlyn Oak</a>
        <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-light text-light" name="search_data_product">
        </form>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li> <a href="display_all.php">Products</a>
                </li>
                
            </ul>
        </nav>
    </header>
    

        <div class="heading">
            <h1>About Us</h1>
            <p>Furniture At Unbeatable Price</p>
        </div>
        <section class="about-us">
            <img src="images/bed.jpg">
            <div class="content">
                <h2>Beryln Oak</h2>
                <p>Beryln Oak has eternally been a part of Indian home's interiors knowingly or unknowingly taking space in the form of may be a simple wooden chair in your living room or an entire furniture set in your bedrooms, making it India's favourite furniture brand. As a Company, Beryln Oak upholds the quality factor of its products at the highest pedestal. This has resulted in Beryln Oak being an undisputed leader in the market. The Company has extended this expertise for Beryln Oak range of Ready Furniture too, to add both emotion and charm to your sheen interiors.
                    The Company aims to bring quality and budget friendly furniture to the some regions in India. With a host of solutions aimed at enhancing lives of customers,Beryln Oak has adapted to the changing furniture trends in the Indian market and reinvented itself time and again.
                    Marking an entry into the E-commerce arena, Nilkamalfurniture.com is designed to be your or stop-shop for quality, trendy and budget-friend furniture range.</p>
            </div>
        </section>


</body>

</html>