<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="index.php">Tienda Test</a>
		    </div>
		    <ul class="nav navbar-nav">
		    <?php
		    	if($active=='index'){
		    		echo '<li class="active"><a href="index.php">Lista de Productos (Proveedor)</a></li>';
		    	}else{
		    		echo '<li><a href="index.php">Lista de Productos (Proveedor)</a></li>';
		    	}

		    	if($active=='clientes'){
		    		echo '<li class="active"><a href="clientes.php">Lista de Productos (Clientes)</a></li>';
		    	}else{
		    		echo '<li><a href="clientes.php">Lista de Productos (Clientes)</a></li>';
		    	}
		    ?>
		    </ul>
		  </div>
		</nav>