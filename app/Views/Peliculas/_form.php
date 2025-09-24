<label for="titles">Titulo</label>
<input type="text" name="titles" placeholder="Titulo de la pelicula" id="titles" value="<?= old('titles',  $pelicula['titles'])?>">
<label for="description">Descripción</label>
<textarea name="description" id="description" cols="30"><?= old('description',  $pelicula['description']) ?></textarea>
<button type="submit"><?= $op ?></button>