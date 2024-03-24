<?php 
session_start();
include('../dbconnect.php');

 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="customerstyle.css">
 	<title></title>
 </head>

 <body>
    <header class="header" id="header">

        <a href="customerhome.php" class="logo">
            <img src="../Images/logo.png">
        </a>
            <div class="nav-bar">   
                <ul>
                    <li class="nav-item">
                        <a href="customerhome.php" class="nav-link ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="info.php" class="nav-link ">CampaignInfo</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Information</a>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="parents.php">Parents & Children</a></li>
                                <li><a href="apps.php">Techniques</a></li>
                                <li><a href="staysafe.php">Stay Safe Guidance</a></li>
                                <li><a href="livestream.php">LiveStreaming Guidance</a></li>
                                <li><a href="famousmedia.php">Famous Social Medias</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="contactus.php" class="nav-link ">Contact Us</a>
                    </li>
                </ul>
                <div class="search">
                    <input type="text" class="search__input" placeholder="Type your text">
                    <button class="search__button1">
                    <svg class="search__icon" aria-hidden="true" viewBox="0 0 24 24">
                            <g>
                            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66            3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                     </g>
                    </svg>
                    </button>
                </div>
        </div>
        
    </header>

 	<div class="info-page">
      <div class="mainhead">

        <div class="mainheadcolumn1">
            <img src="../Images/socialmediacamapign.png">
            <div class="mainheadcolumn1-desc">
                <h2>Check New Detail Information About Campaings</h2>
                <p>
                    Campaigns focused on teenage safety in the realm of social media aim to raise awareness and provide valuable guidance for adolescents navigating the digital landscape. These initiatives often leverage various social media platforms to disseminate information, utilizing hashtags, infographics, and engaging content to reach a broad audience. The campaign details typically encompass safety tips tailored for teenagers, covering topics such as privacy settings, recognizing online threats, and fostering a positive digital footprint. They may also encourage open conversations between parents, educators, and teens about responsible online behavior. By harnessing the power of social media, these campaigns strive to create a safer and more informed digital environment for teenagers.
                </p>
            </div>
        </div>

        
    </div>


    <div class="catalog">
        <h2>Campaign Information</h2>
        
        <?php 

        $query="SELECT * FROM campaignstb";
        $ret=mysqli_query($db,$query);
        $count=mysqli_num_rows($ret);

        if ($count==0) 
        {
            echo "<h2>No Campaign Found</h2>";
        }
        else 
        {

            for ($i=0; $i <$count ; $i+=4) //row
            { 
                
                $query1= "SELECT * FROM campaignstb ORDER By CampaignID
                        LIMIT $i,4";
                $ret1=mysqli_query($db,$query1);
                $count1=mysqli_num_rows($ret1);


                 echo "<div class='column'>";

                for ($j=0; $j <$count1 ; $j++) //column
                {

                    $data=mysqli_fetch_array($ret1);
                    $CpID=$data['CampaignID'];
                    $Cname=$data['CampaignTitle'];
                    $img=$data['CampaignImage3'];
                    $fee=$data['Fees'];
                    $aim=$data['Aim'];
                    $vision=$data['Vision'];

                ?>
                    <div class="img">
                        <img src="<?php echo $img; ?>">
                        <div class="desc">  
                            CampaignName: <?php echo $Cname; ?>
                            <p>Aim: <?php echo $aim; ?></p>
                            <p>Vision: <?php echo $vision; ?></p>
                            <p>Fees: <?php echo $fee; ?></p>
                            <a href="CampDetail.php?CID=<?php echo $CpID; ?>">Detail>></a>
                                
                        </div>

                    </div>

                    <?php

                }

                echo "</div>";

            }


        }



        ?>


    </div>  
    </div>


<footer>
        <div id="google_translate_element"> 
        </div>
        <p>&copy; 2023 Your Website. All rights reserved. | Designed by Your Name</p>
    </footer>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElement">
        </script>
 
        <script>
 
            function googleTranslateElement()
            {
                new google.translate.TranslateElement({pageLanguage: 'en'}, 
                    'google_translate_element');
    
            }
    </script>

  </body>
 </html>




