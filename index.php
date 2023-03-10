<?php include "plantilla/header.php"; ?>
<div class="row">
    <div class="carousel slide" style="padding-bottom: 3%;">
        <div class="carousel-indicators">   
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://estaticosgn-cdn.deia.eus/clip/80ca1ab8-717b-48bd-88ac-ae421786f396_16-9-aspect-ratio_default_0.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://estaticosgn-cdn.deia.eus/clip/80ca1ab8-717b-48bd-88ac-ae421786f396_16-9-aspect-ratio_default_0.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://estaticosgn-cdn.deia.eus/clip/80ca1ab8-717b-48bd-88ac-ae421786f396_16-9-aspect-ratio_default_0.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="col" style="padding-left: 15%; padding-right: 15%; text-align: center;">
        <h2 style="color:#7d7e80; font-family:'Quicksand', Arial,sans-serif; font-size:24px; letter-spacing:3px;">
            Bienvenido a nuestro proyecto
        </h2>
        <h1
            style="padding-bottom: 30px; color:#1d2025; font-family:'Barlow Condensed', Arial,sans-serif; font-size:34px; line-height:42px;">
            Atrav??s De Tus Ojos A.C.
        </h1>

        <img src="https://i.postimg.cc/dQkFmwh2/72526520-508880243003539-7768846469750063104-n.jpg" 
        width="90%"
        alt="">
        <div
            style="padding-bottom: 15px; color:#1d2025; font-family:'Barlow Condensed', Arial,sans-serif; font-size:24px; line-height:32px; text-align:justify;">
            <h3>Tenemos como objetivo la recaudaudacion de recursos para ayudar a la infancia
                y personas desprotegidas, en condiciones precarias o con alguna discapacidad.
            </h3>

            <h4>Esperamos que este proyecto a corto plazo lo sepan valorar ya que es para la alimentaci??n de
                nuestras familias</h4>
        </div>
        <h2 style="color:#7d7e80; font-family:'Quicksand', Arial,sans-serif; font-size:24px; letter-spacing:3px;">
            Novedades
        </h2>
        <img src="https://i.postimg.cc/mrBMCmV9/Volante-Vertical-Rifa-Anuncio-Llamativo-Amarillo.png" 
        width="90%"
        alt="">
        <h1
            style="padding-bottom: 30px; color:#1d2025; font-family:'Barlow Condensed', Arial,sans-serif; font-size:34px; line-height:42px;">
            Participa dando clic aqui!!!!
        </h1>
        <a type="button" class="btn btn-primary btn-lg btn-block" style="margin-bottom: 5%;" href="sorteo.php">
            Ir a la rifa
        </a>
    </div>
</div>
<?php include "plantilla/footer.php"; ?>