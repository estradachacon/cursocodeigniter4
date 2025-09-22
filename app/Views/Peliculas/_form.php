<label for="titles">Titulo</label>
<input type="text" name="titles" placeholder="Titulo de la pelicula" id="titles" value="<?= $pelicula['titles'] ?>">
<label for="description">Descripción</label>
<textarea name="description" id="description" cols="30"><?= $pelicula['description'] ?></textarea>
<button type="submit"><?= $op ?></button>