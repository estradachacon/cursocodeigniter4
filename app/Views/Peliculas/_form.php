<label for="titles">Titulo</label>
<input type="text" name="titles" placeholder="Titulo de la pelicula" id="titles"
    value="<?= old('titles',  $pelicula->titles)?>">

<label for="categoria_id">Categoria</label>
<select name="categoria_id" id="categoria_id">
        <option value=""></option>
    <?php foreach ($categorias as $c) : ?>
        <option <?= $c->id !== old('categoria_id',  $pelicula->categoria_id) ?: 'selected' ?> value="<?= $c->id?>"><?= $c->categoryName?></option>
    <?php endforeach ?>
</select>

<label for="description">Descripción</label>
<textarea name="description" id="description" cols="30"><?= old('description',  $pelicula->description) ?></textarea>
<button type="submit">
    <?= $op ?>
</button>