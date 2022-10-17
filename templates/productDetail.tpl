{include file="header.tpl"}

<h1 class="h1">{$product->brand}</h1>
<div class="card mb-3" style="max-width: 800px;">
    <div class="row g-0">
        <div class="col-md-4">
            {if isset($product->image)}<img src="{$product->image}" class="img-fluid rounded-start">{/if}
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h4 class="card-title">{$product->name}</h5>
                    <ul>
                        <li>Precio:${$product->price}</li>
                        <li>Animal: {$product->animal}</li>
                        <li>Peso: {$product->productWeight}</li>
                        <li>Edad: {$product->animalAge}</li>
                        <li>Mordida: {$product->animalSize}</li>
                    </ul>
            </div>
        </div>
    </div>
</div>
<a href='productList' type='button' class='btn btn-danger ml-auto'>Volver</a>

{include file ="footer.tpl"}