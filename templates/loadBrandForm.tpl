{include file="header.tpl"}

<form action="updateBrand/{$brand->brand_id}" method="POST">
    
    <div class="mb-3">
        <label class="form-label">Nombre de la Marca:</label>
        <input name="brand" type="text" class="form-control" value={$brand->brand}>
    </div>

    <div class="mb-3">
        <label class="form-label">Numero de Contacto:</label>
        <input name="contact" type="text" class="form-control" value={$brand->contact}>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Origen:</label>
        <input name="origin" type="text" class="form-control" value={$brand->origin}>
    </div>

    <button type="submit" class="btn btn-primary">Editar</button>

</form>

{include file ="footer.tpl"}