
                   <?php
include_once('class/classMarcas.php');
include_once('category.php');
?>

                   
                   <div class="sidebar-filter">
                    <div class="top-filter-head">Filtros</div>
                    <div class="common-filter">
                        <div class="head">Marcas</div>
                        
                            <ul>
                                   <h4 class="panel-title">
                                   <?php

               if(!empty($id_categoria)){ 
                 $marca =new sqlMarca($con); 
                foreach($marca->getMarcadeCat($id_categoria) as $row){ ?>
                
                 <li class="filter-list"><a href="category.php?categoria=<?php echo $id_categoria ?>&marca=<?php echo $row['id_marca']?>" ><?php echo $row['descripcion']?><span>(29)</span></a></li><?php }}else{}?>
                                </h4>
                            </ul>
                        
                    </div>
                    
                    
       <!--     <div class="common-filter">
                        <div class="head">Color</div>
                        <form action="#">
                            <ul>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="black"
                                        name="color"><label for="black">Black<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather"
                                        name="color"><label for="balckleather">Black
                                        Leather<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred"
                                        name="color"><label for="blackred">Black
                                        with red<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="gold"
                                        name="color"><label for="gold">Gold<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey"
                                        name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
                            </ul>
                        </form> 
                    </div>
                    <div class="common-filter">
                        <div class="head">Price</div>
                        <div class="price-range-area">
                            <div id="price-range"></div>
                            <div class="value-wrapper d-flex">
                                <div class="price">Price:</div>
                                <span>$</span>
                                <div id="lower-value"></div>
                                <div class="to">to</div>
                                <span>$</span>
                                <div id="upper-value"></div>
                            </div>
                        </div>
                    </div>-->
                </div>