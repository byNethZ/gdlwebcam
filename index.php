<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
  <h2>La mejor conferencia de diseño web en español</h2>
  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis ratione suscipit mollitia aspernatur beatae quis laudantium quae molestias, perferendis iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis ratione suscipit mollitia aspernatur beatae quis laudantium quae molestias, perferendis iure.
  </p>
</section> <!-- seccion -->

<section class="programa">
  <div class="contenedor-video">
    <video autoplay loop poster="./img/bg-talleres.jpg">
      <source src="video/video.mp4" type="video/mp4">
      <source src="video/video.webm" type="video/webm">
      <source src="video/video.ogv" type="video/ogv">
    </video>
  </div> <!-- contenedor video -->
  <div class="contenido-programa">
    <div class="contenedor">
      <div class="programa-evento">
        <h2>Programa del evento</h2>
        <?php
        try {
          require_once('includes/functions/db_connection.php');
          $sql = "SELECT * FROM categoria_evento ";
          $resultado = $conn->query($sql);
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
        ?>
        <nav class="menu-programa">
          <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) {
            $categoria = $cat['cat_evento']; ?>
            <a href="#<?php echo strtolower($categoria) ?>">
              <i class="fas <?php echo $cat['icono']; ?>"></i> <?php echo $categoria; ?>
            </a>
          <?php } ?>
        </nav>

        <?php
        try {
          require_once('includes/functions/db_connection.php');
          $sql = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN invitados ";
          $sql .= " ON eventos.id_inv = invitados.id_invitado ";
          $sql .= " AND eventos.id_cat_evento = 1 ";
          $sql .= " ORDER BY id_evento LIMIT 2;";
          $sql .= "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN invitados ";
          $sql .= " ON eventos.id_inv = invitados.id_invitado ";
          $sql .= " AND eventos.id_cat_evento = 2 ";
          $sql .= " ORDER BY id_evento LIMIT 2;";
          $sql .= "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN invitados ";
          $sql .= " ON eventos.id_inv = invitados.id_invitado ";
          $sql .= " AND eventos.id_cat_evento = 3 ";
          $sql .= " ORDER BY id_evento LIMIT 2;";
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
        ?>

        <?php $conn->multi_query($sql); ?>
        <?php
        do {
          $resultado = $conn->store_result();
          $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

          <?php $i = 0; ?>
          <?php foreach($row as $evento): ?>

            <?php if($i % 2 == 0): ?>
              <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
            <?php endif ?>
            
            <div class="detalle-evento">
              <h3><?php echo $evento['nombre_evento']; ?></h3>
              <p><i class="fas fa-clock"></i><?php echo $evento['hora_evento']; ?></p>
              <p><i class="fas fa-calendar"></i><?php echo $evento['fecha_evento']; ?></p>
              <p><i class="fas fa-user"></i><?php echo $evento['nombre_invitado'] . ' ' . $evento['apellido_invitado']; ?></p>
            </div> <!-- detalle evento -->

            <?php if($i % 2 == 1): ?>
              <a class="button float-right" href="calendario.php">Ver todos</a>
              </div> <!-- id=talleres -->
            <?php endif ?>

            <?php $i++; ?>
          <?php endforeach ?>

          <?php $resultado->free(); ?>

        <?php } while ($conn->more_results() && $conn->next_result()); ?>

      </div> <!-- programa-eventos -->
    </div> <!-- contenedor -->
  </div> <!-- contenido-programa -->
</section> <!-- programa -->

<?php include_once 'includes/templates/invitados.php'; ?>

<div class="contador parallax">
  <div class="contenedor">
    <ul class="resumen-evento clearfix">
      <li>
        <p class="numero">6</p>Invitados
      </li>
      <li>
        <p class="numero">15</p>Talleres
      </li>
      <li>
        <p class="numero">3</p>Días
      </li>
      <li>
        <p class="numero">9</p>Conferencias
      </li>
    </ul>
  </div>
</div>

<section class="precios seccion">
  <h2>Precios</h2>
  <div class="contenedor">
    <ul class="lista-precios clearfix">
      <li>
        <div class="tabla-precio">
          <h3>Pase por día</h3>
          <p class="numero">$ 30</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="" class="button hollow">Comprar</a>
        </div> <!-- tabla-precio -->
      </li>

      <li>
        <div class="tabla-precio">
          <h3>Todos los días</h3>
          <p class="numero">$ 50</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="" class="button">Comprar</a>
        </div> <!-- tabla-precio -->
      </li>

      <li>
        <div class="tabla-precio">
          <h3>Pase por 2 días</h3>
          <p class="numero">$ 45</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="" class="button hollow">Comprar</a>
        </div> <!-- tabla-precio -->
      </li>
    </ul> <!-- lista-precios -->
  </div>
</section>
<div id="mapa" class="mapa"></div>

<section class="seccion">
  <h2>Testimoniales</h2>
  <div class="testimoniales contenedor clearfix">
    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quaerat cumque ullam fuga pariatur quidem accusamus ipsum corrupti delectus consequuntur. Maiores delectus quasi reiciendis aperiam. Dignissimos odio unde et voluptatem!</p>
        <footer class="info-testimonial clearfix">
          <img src="./img/testimonial.jpg" alt="imagen testimonial">
          <cite>Osvaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div> <!-- Testimonial -->
    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quaerat cumque ullam fuga pariatur quidem accusamus ipsum corrupti delectus consequuntur. Maiores delectus quasi reiciendis aperiam. Dignissimos odio unde et voluptatem!</p>
        <footer class="info-testimonial clearfix">
          <img src="./img/testimonial.jpg" alt="imagen testimonial">
          <cite>Osvaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div> <!-- Testimonial -->
    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quaerat cumque ullam fuga pariatur quidem accusamus ipsum corrupti delectus consequuntur. Maiores delectus quasi reiciendis aperiam. Dignissimos odio unde et voluptatem!</p>
        <footer class="info-testimonial clearfix">
          <img src="./img/testimonial.jpg" alt="imagen testimonial">
          <cite>Osvaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div> <!-- Testimonial -->
  </div>
</section>
<div class="newsletter parallax">
  <div class="contenido contenedor">
    <p>registrate al newsletter</p>
    <h3>GdlWebCamp</h3>
    <a href="#mc_embed_signup" class="boton_newsletter button transparent">Registro</a>
  </div> <!-- contenido -->
</div> <!-- newsletter -->

<section class="seccion">
  <h2>Faltan</h2>
  <div class="cuenta-regresiva contenedor">
    <ul class="clearfix">
      <li>
        <p class="numero">80</p>dias
      </li>
      <li>
        <p class="numero">15</p>horas
      </li>
      <li>
        <p class="numero">5</p>minutos
      </li>
      <li>
        <p class="numero">30</p>segundos
      </li>
    </ul>
  </div>
</section>

<?php include_once 'includes/templates/footer.php'; ?>