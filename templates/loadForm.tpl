{include file="header.tpl"}

<form action="updateProduct/{$product->id_products}" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label class="form-label">Presentacion de producto:</label>
        <select name="animal" class="form-select" aria-label="Default select example">
            <option selected>{$product->animal}</option>
            <option value="Gato">Gato</option>
            <option value="Perro">Perro</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre de producto:</label>
        <input name="name" type="text" class="form-control" value={$product->name}>
    </div>

    <div class="mb-3">
        <label class="form-label">Marca:</label>
        <select name="brand" class="form-select" aria-label="Default select example" required>
            <option selected>{$product->brand}</option>
            {foreach from=$brands item=$brand}
                <option value="{$brand->brand}">{$brand->brand}</option>
            {/foreach}
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Precio:</label>
        <input name="price" type="text" class="form-control" value={$product->price} </div>

        <div class="mb-3">
            <label class="form-label">Presentacion de producto:</label>
            <select name="productWeight" class="form-select" aria-label="Default select example">
                <option selected>{$product->productWeight}</option>
                <option value="3 kg">3 kg</option>
                <option value="7.5 kg">7.5 kg</option>
                <option value="8 kg">8 kg</option>
                <option value="15 kg">15 kg</option>
                <option value="20 kg">20 kg</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Edad del animal:</label>
            <select name="animalAge" class="form-select" aria-label="Default select example">
                <option selected>{$product->animalAge}</option>
                <option value="Cachorro">Cachorro</option>
                <option value="Adulto">Adulto</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tamaño de Mordida</label>
            <select name="animalSize" class="form-select" aria-label="Default select example">
                <option selected>{$product->animalSize}</option>
                <option value="Mordida Chica">Mordida Chica</option>
                <option value="Mordida Grande">Mordida Grande</option>
                <option value="Tamaño unico">Tamaño unico</option>
            </select>
        </div>
        
        <div class="mb-3">
            <input type="file" name="image" id="imageToUpload" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Editar</button>

</form>

{include file ="footer.tpl"}