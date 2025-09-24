        <label for="categoryName">Titulo</label>
        <input type="text" name="categoryName" placeholder="Categoría de la pelicula" id="categoryName" value="<?= old('categoryName',  $categorias['categoryName']) ?>">
        <button type="submit"><?= $op ?></button>