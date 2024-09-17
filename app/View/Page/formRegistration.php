<?php
require_once __DIR__ . '/../../Components/navbar.php';
?>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>

<section class="formRegistration">
    <h1>Daftar Beasiswa</h1>
    <form method="POST" action="/Aplikasi-Beasiswa/public/index.php/registration/submit" enctype="multipart/form-data" id="formRegistration">

        <div>
            <label for="name">Nama Lengkap</label>
            <div class="inputContainer">
                <input type="text" name="name" id="name" required>
            </div>
        </div>

        <hr>

        <div>
            <label for="email">Email</label>
            <div class="inputContainer">
                <input type="text" name="email" id="email" required>
            </div>
        </div>

        <hr>

        <div>
            <label for="phone">No Hp</label>
            <div class="inputContainer">
                <input type="text" name="phone" id="phone" required>
            </div>
        </div>

        <hr>

        <div>
            <label for="semester">Semester</label>
            <div class="inputContainer">
                <select name="semester" id="semester">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
        </div>

        <hr>

        <div>
            <label for="gpa">IPK</label>
            <div class="inputContainer">
                <input type="text" name="gpa" id="gpa" value="3.4" required>
            </div>
        </div>

        <hr>

        <div>
            <label for="jenisBeasiswa">Jenis Beasiswa</label>
            <div class="inputContainer">
                <select name="jenisBeasiswa" id="jenisBeasiswa">
                    <option value="Akademik">Beasiswa Akademik</option>
                    <option value="Non-Akademik">Beasiswa Non-Akademik</option>
                </select>
            </div>
        </div>

        <hr>

        <div>
            <label for="file">Berkas Bersyarat</label>
            <div class="inputContainer">
                <input type="file" name="file" id="file" required>
            </div>
        </div>

        <div class="buttonContainer">
            <button type="button" onclick="window.history.back();">Batal</button>
            <button type="submit" name="submit" value="register">Daftar</button>
        </div>
    </form>
    <script src="/Aplikasi-Beasiswa/public/js/validation.js"></script>

</section>

<?php require_once __DIR__ . '/../../Components/footer.php'; ?>