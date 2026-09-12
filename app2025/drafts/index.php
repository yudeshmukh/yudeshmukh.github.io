<?php
// 1. --- HTML HEAD & OPENING BODY (Same as your .header.html) ---
echo '<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Yash Deshmukh - File Directory</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../css/index.css"> 
    <style>
        /* Optional: Add custom styling for the file list */
        .file-list li {
            margin-bottom: 0.5rem;
        }
        .file-list a {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row" style="margin-top: 5%">
            <h4>Index of /~deshmukh/app2025/drafts</h4>
            <ul class="file-list">'; // Use an unordered list for the file list



// --- 2. CONFIGURATION FOR REDIRECTION ---
// Define the file name to redirect
$target_file = 'nearby_cocores.pdf'; 
// Define the external URL to link to
$redirect_url = 'https://arxiv.org/abs/2511.09548'; // **<--- REPLACE THIS WITH YOUR ACTUAL URL**


// 2. --- PHP LOGIC TO READ FILES ---
$files = scandir('.'); // Reads all files/folders in the current directory

foreach($files as $file) {
    if ($file != '.htaccess' && $file != '.header.html' && $file != 'index.php' && $file != '.index.php.swp'){
        $path = $file;
        
        if (is_dir($file)) {
            // It's a directory, add a trailing slash
            echo "<li> <a href='$path/'>$file/</a></li>"; 
	} else {
            // It's a file
		if ($file === $target_file) {
			// Redirect link for the target file
			$path = $redirect_url;
		}
		echo "<li> <a href='$path'>$file</a></li>";
        }
    }
}

// 3. --- CLOSING HTML TAGS ---
echo '      </ul>
        </div>
</div>
</body>
</html>';

?>
