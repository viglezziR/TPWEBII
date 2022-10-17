{include file="header.tpl"}

<table class="table">
  <thead>
    <tr>
      <th scope="col">Marca</th>
      <th scope="col">Contacto</th>
      <th scope="col">Origen</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$brands item=$brand}
      <tr>
        <td>{$brand->brand}</td>
        <td>{$brand->contact}</td>
        <td>{$brand->origin}</td>
        {if isset($smarty.session.USER_ID)}
          <td><a href='deleteBrand/{$brand->brand_id}' type='button' class='btn btn-danger ml-auto'>Eliminar</a></td>
          <td><a href='loadBrandForm/{$brand->brand}' type='button' class='btn btn-danger ml-auto'>Modificar</a></td>
        {/if}
      </tr>
    {/foreach}
  </tbody>
</table>

{if isset($smarty.session.USER_ID)}
  {include file ="brandForm.tpl"}
{/if}
{include file ="footer.tpl"}