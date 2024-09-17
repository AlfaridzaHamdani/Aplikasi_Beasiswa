<?php
require_once __DIR__ . '/../../Components/navbar.php';
?>

<section class="result">
    <div class="stat">
        <div>

            <h3>
                Jumlah Pendaftar
            </h3>
            <h2>
                <?php echo htmlspecialchars($totalApplicants); ?>
            </h2>

            <h3>
                Beasiswa Akademik
            </h3>
            <h2>
                <?php echo htmlspecialchars($academicCount); ?>
            </h2>

            <h3>
                Beasiswa Non Akademik
            </h3>
            <h2>
                <?php echo htmlspecialchars($nonAcademicCount); ?>
            </h2>

            <h3>
                Peserta Beasiswa Akademik Diterima
            </h3>
            <h2>
                <?php echo htmlspecialchars($acceptedAcademic); ?>
            </h2>

            <h3>
                Peserta Beasiswa Non Akademik Diterima
            </h3>
            <h2>
                <?php echo htmlspecialchars($acceptedNonAcademic); ?>
            </h2>
        </div>

        <div class="grafik">
            <div class="chart">
                <canvas id="participants"></canvas>
                <canvas id="category"></canvas>
            </div>

            <script>
                const categoryData = <?php echo $categoryChartData; ?>;
                const participantsData = <?php echo $participantChartData; ?>;

                const categoryLabels = Object.keys(categoryData);
                const categoryValues = Object.values(categoryData);

                const categoryColors = [
                    '#266DF0',
                    '#54D490',
                    '#14AED5',

                ];

                const ctxCategory = document.getElementById('category').getContext('2d');
                const categoryChart = new Chart(ctxCategory, {
                    type: 'pie',
                    data: {
                        labels: categoryLabels,
                        datasets: [{
                            label: 'Jumlah ',
                            data: categoryValues,
                            backgroundColor: categoryColors.slice(0, categoryLabels.length),
                            borderColor: '#fff',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });

                const statusLabels = Object.keys(participantsData);
                const statusValues = Object.values(participantsData);

                const ctxStatus = document.getElementById('participants').getContext('2d');
                const statusChart = new Chart(ctxStatus, {
                    type: 'pie',
                    data: {
                        labels: statusLabels,
                        datasets: [{
                            label: 'Jumlah ',
                            data: statusValues,
                            backgroundColor: categoryColors.slice(0, categoryLabels.length),
                            borderColor: '#fff',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            </script>
        </div>


    </div>

    <div class="applicant">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Semester</th>
                    <th>IPK</th>
                    <th>Jenis Beasiswa</th>
                    <th>Berkas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($scholarships as $scholarship): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($scholarship['name']); ?></td>
                        <td><?php echo htmlspecialchars($scholarship['email']); ?></td>
                        <td><?php echo htmlspecialchars($scholarship['phone']); ?></td>
                        <td><?php echo htmlspecialchars($scholarship['semester']); ?></td>
                        <td><?php echo htmlspecialchars($scholarship['gpa']); ?></td>
                        <td><?php echo htmlspecialchars($scholarship['scholarship_type']); ?></td>
                        <td><?php echo htmlspecialchars($scholarship['file']); ?></td>
                        <td><?php
                            // Proses status beasiswa
                            $statusText = ($scholarship['status'] === '0')
                                ? $scholarshipsStatus[0]
                                : $scholarshipsStatus[1];
                            echo htmlspecialchars($statusText);
                            ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>