{include file="header.tpl"}

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Marca</th>
      <th scope="col">Precio</th>
      <th scope="col">Animal</th>
      <th scope="col">Peso</th>
      <th scope="col">Edad del animal</th>
      <th scope="col">Tamano de mordida</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$products item=$product}
      <tr>
        <td><a href='detail/{$product->id_products}'>{$product->name}</a></td>
        <td>{$product->brand}</td>
        <td>{$product->price}</td>
        <td>{$product->animal}</td>
        <td>{$product->productWeight}</td>
        <td>{$product->animalAge}</td>
        <td>{$product->animalSize}</td>
        {if isset($smarty.session.USER_ID)}
          <td><a href='deleteProduct/{$product->id_products}' type='button' class='btn btn-danger ml-auto'>Eliminar</a></td>
          <td><a href='loadForm/{$product->id_products}' type='button' class='btn btn-danger ml-auto'>Modificar</a></td>
        {/if}
      </tr>
    {/foreach}
  </tbody>
</table>

<form action="filterBy" method="POST">
  <div class="mb-3">
    <label class="form-label">Filtrar por Marca:</label>
    <select name="brand" class="form-select" aria-label="Default select example" required>
      <option disabled selected value="">Seleccione la Marca</option>
      {foreach from=$brands item=$brand}
        <option value="{$brand->brand}">{$brand->brand}</option>
      {/foreach}
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Filtrar</button>
  <a href='productList' type='button' class='btn btn-danger ml-auto'>Volver</a>

  {if isset($smarty.session.USER_ID)}
    <a href='productForm' type='button' class='btn btn-danger ml-auto'>Agregar un nuevo producto</a>
  {/if}
</form>

{include file ="footer.tpl"}