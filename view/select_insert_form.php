<?php include "header.php"; ?>
<section class="">
    <h2 class="mt-4 text-decoration-underline">Select Data\ Read Data:</h2>
    <form action="." method="get">
        <div class="col">
            <input type="hidden" name="action" value="select">
            <label for="city">City Name:</label>
            <input type="text" name="city" class="form-control" id="city">
            <button class="btn btn-primary my-2">Ok</button>
        </div>
    </form>

    <h2 class="mt-4 text-decoration-underline">Insert Data\ Add Data:</h2>
    <form action="." method="post">
        <div class="col">
            <input type="hidden" name="action" value="insert">
            <label for="city" class="form-label">City Name:</label>
            <input type="text" name="city" class="form-control" id="city">

            <label for="countrycode">Country Code:</label>
            <!--                <input type="text" name="countrycode" value="" id="countrycode">-->
            <select name="countrycode" id="countrycode" class="form-select ">
                <?php

                $codes = get_codes();
                foreach ($codes as $code) {
                    echo "<option value=\"$code[0]\">$code[0]</option>";

                }
                ?>
            </select>

            <label for="district">district:</label>
            <input type="text" name="district" class="form-control" value="" id="district">

            <label for="population">Population:</label>
            <input type="text" name="population" class="form-control" value="" id="population">

            <button class="btn btn-primary my-2">INSERT</button>
        </div>
    </form>
<?php include "status.php"; ?>
</section>

<?php include "footer.php"; ?>
