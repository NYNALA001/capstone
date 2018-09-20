<?php
include './assets/php/session.php';
?>

    <html lang="en">

    <head>
        <title>CAIR</title>
        <?php include './assets/php/dependencies.php';
?>
    </head>

    <body>
        <div class = "container">
        <?php include './assets/php/header.php';?>

            <br>

            <details>
                <summary><a>About Us</a></summary>
                <br>
                <br> The Centre for Artificial Intelligence Research (CAIR) is a South African distributed Centre of Excellence that conducts foundational, directed and applied research into various aspects of Artificial Intelligence. CAIR has nodes at five South African universities: the University of Cape Town, University of KwaZulu-Natal, North-West University, University of Pretoria and Stellenbosch University, and is coordinated and managed by the Meraka Institute at the Council for Scientific and Industrial Research. <a href="about.php">read more...</a>

            </details>

            <div>

                <br>
                <table style="width: 100%">
                    <tr>
                        <th style="text-align: left;">Publication</th>
                        <th style="text-align: left;">Author</th>
                        <th style="text-align: left;">Date Posted</th>
                        <th style="text-align: left;"></th>
                    </tr>

                    <div>
                        <!--<button onclick="window.print()">print</button>-->
                        <form method="GET" action="" id="searchform">
                            <input type="text" name="search" placeholder="">
                            <input type="submit" name="action" value="Search">
                        </form>
                        <!--<form method="GET" action="" id="searchform">
					<select name="filter">
						<option value="">Researchers</option>
						<option value="">Nodes</option>
						<option value="">Publication</option>

					</select>
				</form>-->

                        <?php
				$searchcounter = 0;
				if(isset($_GET['search'])){
					$search = $_GET['search'];
					echo "<br><br><b>Results</b><br>";
					if(strlen($search) >0){

						foreach ($articles as $article){
							if(strpos(strtolower($article->get_title()),strtolower($search)) !== false){
								$searchcounter++
								?>
                            <p>
                                <a href="article.php?id=<?php echo $article->get_id();?>"><?php echo $article->get_title();?></a>
                            </p>

                            <?php }

						}
                        
                        

		
                        
                        
          if($searchcounter==0){ ?>
                                <br>
                                <p>
                                    <?php echo "No results found";?>
                                </p>
                                <?php }
					}

           if(strlen($search) ==0){ ?>
                                    <br>
                                    <p>
                                        <?php echo "No input was inserted";?>
                                    </p>
                                    <?php }

				}
				?>

                    </div>

                    <br>
                    <br>
                    <?php 
			$count = 0;
			foreach ($articles as $article):
			?>
                        <tr>

                            <td><a href="article.php?id=<?php echo $article->get_id();?>"><?php echo $article->get_title(); ?>
				</a></td>
                            <td> <?php 
                                
                                //echo $article->get_authors();
                               // $withComma = implode(",", $article->get_authors());

                               //echo $withComma;
                                
                            
                                
                                ?></td>
                            
                            
                            <td><small><?php echo date("Y-m-d",$article->get_date());?> </small>
                                <?php $count++;	if ($count >= 5) break;?>
                            </td>
                        </tr>

                        <?php endforeach;?>

                </table>

                <small><a href="publications.php">see more...</a></small>

                <br>
                <br>
                <br>
                </div>
            
        </div>

                        <?php include './assets/php/footer.php';?>
               

    </body>

    </html>