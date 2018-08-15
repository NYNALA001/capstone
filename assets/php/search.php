                <div>
                        <form method="GET" action="" id="searchform">
                            <input type="text" name="search" placeholder="article name">
                            <input type="submit" name="action" value="Search">
                        </form>

                        <?php
       $searchcounter = 0;
       if(isset($_GET['search'])){
           $search = $_GET['search'];

          if(strlen($search) >0){ 
              foreach ($articles as $article){
           if(strpos(strtolower($article->get_title()),strtolower($search)) !== false){ $searchcounter++
               ?>
                            <p>
                                <?php echo $article->get_title();?>
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