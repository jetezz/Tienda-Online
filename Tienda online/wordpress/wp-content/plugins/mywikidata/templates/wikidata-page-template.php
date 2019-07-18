<?php
/**
 * Template Name: Wikidata Page
 *
 */
?>

<?php get_header() ?>


<div id="container" class="container">
    <section id="main" role="main" class="row">
        <div class="content_background">

        	<div class="wrap">

		<fieldset>
            <legend>Buscador de autores</legend>
			<p>Consulta los autores por movimientos literatios y recupera información de Wikidata</p>
			<form method="post" name="front_end" action="" >
				<p>
				<label for="numresults">Movimiento:</label><br>
				<select name="movement">
				  <option value="Q530936">Siglo de Oro</option>
				  <option value="Q37068">Romanticismo</option>
				  <option value="Q2302005">Generación del 50</option>
				  <option value="Q1126248">Generación del 98</option>
				  <option value="Q667661">Realismo literario</option>
				  <option value="Q397469">Neorromanticismo</option>
				  <option value="Q5600643">Modernismo</option>
				  <option value="Q1122677">Modernismo catalán</option>
				</select>
				</p>
				
				<p>
				<label for="numresults">Número resultados:</label><br>
				<select name="numresults">
				  <option value="10">10</option>
				  <option value="20">20</option>
				  <option value="50">50</option>
				  <option value="100">100</option>
				  <option value="all">Todos</option>
				</select>
				</p>
				<input type="hidden" name="new_search" value="1"/>
				<button type="submit">Buscar</button>
			</form>
		</fieldset>
		
			<?php
			if(isset($_POST['new_search']) == '1') {
				$movement = $_POST['movement'];
				
				if(isset($numresults))
					$numresults = $_POST['numresults'];
				else
					$numresults = 10;
				
				movement_wikidata_call($movement, $numresults);
			}
			?>
            
</div><!-- .wrap -->
        	
           

            <div id="content" class="<?php echo esc_attr( shophistic_lite_content_check_sidebar() ); ?>">
            </div>
        </div>
    </section>
</div>


    
    
    
  







<?php get_footer() ?>