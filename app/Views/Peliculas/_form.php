<label for="titles">Titulo</label>
<input type="text" name="titles" placeholder="Titulo de la pelicula" id="titles"
    value="<?= old('titles',  $peliculas->titles)?>">

<label for="categoria_id">Categoria</label>
<select name="categoria_id" id="categoria_id">
        <option value=""></option>
    <?php foreach ($categorias as $c) : ?>
        <option <?= $c->id !== old('categoria_id',  $peliculas->categoria_id) ?: 'selected' ?> value="<?= $c->id?>"><?= $c->categoryName?></option>
    <?php endforeach ?>
</select>

<label for="description">Descripción</label>
<textarea name="description" id="description" cols="30"><?= old('description',  $peliculas->description) ?></textarea>
<button type="submit">
    <?= $op ?>
</button>