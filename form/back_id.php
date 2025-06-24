<?php
require_once "dbhelper-form.php";

if (!isset($id)) {
    // If included directly, fallback to $_GET
    if (!isset($_GET["id"])) {
        echo "No ID provided.";
        exit();
    }
    $id = $_GET["id"];
}

$results = Joiningtables($id);
$row = !empty($results) ? $results[0] : null;
?>
<div class="id-card">
    <div class="header">Family & Community Welfare Unit</div>
    <div class="contact-info">
        <strong>In Case of Emergency</strong><br>
        <?php
        $icoe = htmlspecialchars($row->icoe ?? "No emergency contact available");
        $contact = str_replace(["\r", "\n"], '', htmlspecialchars($row->icoecontact_no ?? ""));
        if ($contact && $icoe !== "No emergency contact available") {
            echo $icoe . "<br>" . $contact;
        } else {
            echo "No emergency contact available";
        }
        ?>
    </div>
    <ul>
        <li class="bullet">Issued by <strong>FAMILY & COMMUNITY WELFARE UNIT</strong> under Cebu City Government.</li>
        <li class="bullet">This ID card is non-transferable.</li>
        <li class="bullet">Valid until 2025.</li>
    </ul>
    <p style="font-size: 9px; text-align: center;">In case of loss, notify The Department of Social Welfare Services.</p>
    <div class="signature">
        <span class="line"></span>
        HON. RAYMOND CALVIN N. GARCIA<br>
        City Mayor
    </div>
</div>