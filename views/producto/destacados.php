<h1>Algunos de nuestros Productos </h1>

	<?php while($product = $productos->fetch_object()): ?>
                <div class="product">
                
                <?php if($product->image != null): ?>
                
                    <img src="<?=base_url?>uploads/images/<?=$product->image?>" />
                    
                <?php else: ?>
                    
                    <img src="<?=base_url?>assets/img/camiseta.png">
                    
                <?php endif; ?>
                    
                    <h2><?=$product->nombre?></h2>
                    <p><?=$product->precio?></p>
                    <a href="" class="button">Comprar</a>
                </div>
                <?php endwhile; ?>
             
            
       