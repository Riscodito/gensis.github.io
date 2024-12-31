<?php
    require_once 'process.php';
    include 'header.php';
?>

    <form action="process.php" method="POST">

    <div class="main">

    <h3>Rangkai kalimat sesukamu!</h3>

    <label for="tenses">Pilih Tenses:</label>
    <select name="tenses" class="form-select" aria-label="Default select example" required>
        <option value="simple present tense">Simple Present Tense</option>
        <option value="simple past tense">Simple Past Tense</option>
        <option value="simple future tense">Simple Future Tense</option>
    </select>

    <label for="subjek">Pilih Subjek:</label>
    <select name="subjek" class="form-select" aria-label="Default select example" required>
        <option value="I">I</option>
        <option value="You">You</option>
        <option value="She">She</option>
        <option value="He">He</option>
        <option value="They">They</option>
        <option value="We">We</option>
        <option value="It">It</option>
        <option value="nama orang random">Nama Orang</option>
    </select>

    <label for="place">Pilih Tempat:</label>
    <select name="place" class="form-select" aria-label="Default select example" required>
        <option value="area di rumah">Rumah</option>
        <option value="area di sekolah">Sekolah</option>
        <option value="area di jalan">Jalan</option>
        <option value="area di rumah sakit">Rumah Sakit</option>
        <option value="area di pasar">Pasar</option>
        <option value="area di pantai">Pantai</option>
        <option value="area di lapangan">Lapangan</option>
        <option value="area di peternakan">Peternakan</option>
    </select>

    <button type="submit" class="btn btn-dark">Buatkan</button>

    </div>

    </form>

    <div class="content">
        <h3>Berikut ini kalimatmu:</h3>
        <p>
            <?php 
                if (isset($_SESSION['text'])) {
                    echo $_SESSION['text'];
                    unset($_SESSION['text']);
                }
            ?>
        </p>
    </div>

<?php
    include 'footer.php';
?>