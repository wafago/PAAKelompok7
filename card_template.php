<style>
    /* Custom styles for the card */
    .card {
        height: 400px; /* Set a fixed height for the card */
        overflow: hidden; /* Hide overflowing content */
    }

    .card-img-top {
        object-fit: cover; /* Ensure the image covers the entire container */
        height: 200px; /* Set the height of the image */
    }

    .card-body {
        padding: 15px; /* Add padding to the card body */
    }

    .card-title {
        font-size: 18px; /* Adjust the font size for the title */
        margin-bottom: 10px; /* Add margin to the bottom of the title */
        white-space: nowrap; /* Prevent line breaks in the title */
        overflow: hidden; /* Hide overflowing content */
        text-overflow: ellipsis; /* Display ellipsis (...) for overflow */
    }

    .card-text {
        font-size: 14px; /* Adjust the font size for the text */
        white-space: nowrap; /* Prevent line breaks in the text */
        overflow: hidden; /* Hide overflowing content */
        text-overflow: ellipsis; /* Display ellipsis (...) for overflow */
        text-align: left;
    }

    .btn-primary {
        margin-top: 10px; /* Add margin to the top of the button */
    }
</style>

<!-- Produk akan ditampilkan di sini -->
<div class="col-md-4 mb-4">
    <div class="card">
        <img src="<?= $imgSrc ?>" class="card-img-top" alt="zO">
        <div class="card-body">
            <h4 class="card-title">
                <?= $cardTitle ?>
            </h4>
            <p class="card-text">
                <?= $cardDescription ?>
            </p>
            <p class="card-text">
                Rp. <?= $cardPrice ?> /Jam
            </p>
            
            <a href="<?= $cardLink ?>" class="btn btn-primary">
                <?= $linkText ?>
            </a>
        </div>
    </div>
</div>
