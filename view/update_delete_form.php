<?php include "header.php"; ?>
<section>
    <h2>Update Or Delete Data: </h2>

    <?php foreach ($results as $result) {
        $id = $result['ID'];
        $city = $result['Name'];
        $countrycode = $result['CountryCode'];
        $district = $result['District'];
        $population = $result['Population'];
        ?>


        <form class="update" action="." method="POST">
            <div class="col">

                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= $id ?>">

                <label for="city-<?= $id ?>">City Name:</label>
                <input type="text" id="city-<?= $id ?>" class="form-control" name="city" value="<?= $city ?>" required>

                <label for="countrycode-<?= $id ?>">Country Code:</label>
                <input type="text" id="countrycode-<?= $id ?>" class="form-control" name="countrycode" maxlength="3"
                       value="<?= $countrycode ?>" required>

                <label for="district">District:</label>
                <input type="text" id="district" name="district" class="form-control" value="<?= $district ?>">

                <label for="population">Population:</label>
                <input type="text" id="population" class="form-control" name="population"
                       value="<?= $population ?>">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
        <form class="delete" action="." method="POST">
            <div class="col">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button class="red btn btn-danger">Delete</button>
            </div>
        </form>

    <?php } ?>
    <?php include "status.php"; ?>
</section>
<a href="." class="d-block text-primary">Go to Request Forms</a>

<?php include "footer.php"; ?>
