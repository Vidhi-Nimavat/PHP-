<!--Resume Generator Using String Formatting
Objective: To create a formatted resume using string manipulation and array data.
Outcome: Students will explore string formatting techniques for dynamic content
generation.-->
<?php
// Helper function to sanitize input
function cleanInput($data) {
    return htmlspecialchars(trim($data));
}

// Functions to format lists and sections (same as before)
function formatList(array $items): string {
    $html = "<ul>";
    foreach ($items as $item) {
        $html .= "<li>" . cleanInput($item) . "</li>";
    }
    $html .= "</ul>";
    return $html;
}

function formatEducation(array $education): string {
    $html = "";
    foreach ($education as $edu) {
        if(empty($edu['degree']) && empty($edu['institution'])) continue;
        $html .= "<div class='edu-item'>";
        $html .= "<h3>" . cleanInput($edu['degree']) . " - <span class='institution'>" . cleanInput($edu['institution']) . "</span></h3>";
        $html .= "<p class='year'>" . cleanInput($edu['year']) . "</p>";
        if (!empty($edu['details'])) {
            $html .= "<p class='details'>" . cleanInput($edu['details']) . "</p>";
        }
        $html .= "</div>";
    }
    return $html;
}

function formatWorkExperience(array $workExperience): string {
    $html = "";
    foreach ($workExperience as $job) {
        if(empty($job['position']) && empty($job['company'])) continue;
        $html .= "<div class='job-item'>";
        $html .= "<h3>" . cleanInput($job['position']) . " - <span class='company'>" . cleanInput($job['company']) . "</span></h3>";
        $html .= "<p class='duration'>" . cleanInput($job['duration']) . "</p>";
        $html .= formatList($job['responsibilities']);
        $html .= "</div>";
    }
    return $html;
}

// Initialize variables
$showForm = true;
$errors = [];
$personalInfo = [
    'name' => '',
    'title' => '',
    'email' => '',
    'phone' => '',
    'linkedin' => '',
    'summary' => ''
];
$education = [];
$workExperience = [];
$skills = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize personal info
    $personalInfo = [
        'name' => cleanInput($_POST['name'] ?? ''),
        'title' => cleanInput($_POST['title'] ?? ''),
        'email' => cleanInput($_POST['email'] ?? ''),
        'phone' => cleanInput($_POST['phone'] ?? ''),
        'linkedin' => cleanInput($_POST['linkedin'] ?? ''),
        'summary' => cleanInput($_POST['summary'] ?? '')
    ];

    // Simple validation for required personal info
    if (!$personalInfo['name']) $errors[] = "Name is required.";
    if (!$personalInfo['title']) $errors[] = "Job title is required.";
    if (!$personalInfo['email']) $errors[] = "Email is required.";

    // Education (multiple entries)
    $eduDegrees = $_POST['edu_degree'] ?? [];
    $eduInstitutions = $_POST['edu_institution'] ?? [];
    $eduYears = $_POST['edu_year'] ?? [];
    $eduDetails = $_POST['edu_details'] ?? [];

    $education = [];
    for ($i = 0; $i < count($eduDegrees); $i++) {
        $education[] = [
            'degree' => cleanInput($eduDegrees[$i]),
            'institution' => cleanInput($eduInstitutions[$i]),
            'year' => cleanInput($eduYears[$i]),
            'details' => cleanInput($eduDetails[$i])
        ];
    }

    // Work experience (multiple entries)
    $workPositions = $_POST['work_position'] ?? [];
    $workCompanies = $_POST['work_company'] ?? [];
    $workDurations = $_POST['work_duration'] ?? [];
    $workResponsibilities = $_POST['work_responsibilities'] ?? [];

    $workExperience = [];
    for ($i = 0; $i < count($workPositions); $i++) {
        // Responsibilities are submitted as multiline text, split by new lines
        $resp = [];
        if (isset($workResponsibilities[$i])) {
            $lines = explode("\n", trim($workResponsibilities[$i]));
            foreach ($lines as $line) {
                $line = trim($line);
                if ($line !== '') $resp[] = $line;
            }
        }
        $workExperience[] = [
            'position' => cleanInput($workPositions[$i]),
            'company' => cleanInput($workCompanies[$i]),
            'duration' => cleanInput($workDurations[$i]),
            'responsibilities' => $resp
        ];
    }

    // Skills (comma separated string)
    $skillsRaw = $_POST['skills'] ?? '';
    $skills = array_filter(array_map('trim', explode(',', $skillsRaw)));

    if (empty($errors)) {
        $showForm = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Dynamic Resume Generator</title>
<style>
  /* Reset & base */
  * {
    box-sizing: border-box;
  }
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 20px auto;
    max-width: 900px;
    background: #fefefe;
    color: #333;
  }
  h1, h2, h3 {
    color: #007acc;
  }
  h1 {
    text-align: center;
    margin-bottom: 40px;
  }
  form {
    background: #f9fafb;
    padding: 25px 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
  label {
    display: block;
    font-weight: 600;
    margin-top: 15px;
    margin-bottom: 6px;
  }
  input[type="text"],
  input[type="email"],
  textarea {
    width: 100%;
    padding: 10px 12px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 1rem;
    resize: vertical;
  }
  textarea {
    min-height: 70px;
  }
  button {
    margin-top: 25px;
    background-color: #007acc;
    border: none;
    padding: 14px 20px;
    color: white;
    font-size: 1.1rem;
    border-radius: 7px;
    cursor: pointer;
  }
  button:hover {
    background-color: #005f99;
  }
  .error-list {
    background: #f8d7da;
    color: #721c24;
    border-left: 6px solid #dc3545;
    padding: 10px 15px;
    margin-bottom: 20px;
    border-radius: 6px;
  }
  /* Resume styles */
  header {
    text-align: center;
    margin-bottom: 40px;
  }
  header h1 {
    font-size: 2.8rem;
    margin: 0;
  }
  header h2 {
    font-weight: normal;
    font-size: 1.4rem;
    color: #666;
    margin-top: 5px;
  }
  .contact-info {
    margin-top: 10px;
    font-size: 0.95rem;
    color: #555;
  }
  .contact-info span {
    margin: 0 10px;
  }
  section {
    margin-bottom: 30px;
  }
  section h2 {
    border-bottom: 2px solid #007acc;
    padding-bottom: 6px;
    color: #007acc;
    margin-bottom: 15px;
  }
  .edu-item, .job-item {
    margin-bottom: 20px;
  }
  .institution, .company {
    font-weight: normal;
    color: #555;
    font-style: italic;
  }
  .year, .duration {
    color: #777;
    font-size: 0.9rem;
    margin-top: 2px;
    margin-bottom: 8px;
  }
  ul {
    padding-left: 20px;
    margin: 0;
  }
  ul li {
    margin-bottom: 6px;
    line-height: 1.3;
  }
  .details {
    font-size: 0.9rem;
    color: #555;
  }
  .skills-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
  }
  .skill {
    background-color: #007acc;
    color: white;
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 0.9rem;
    user-select: none;
  }
  /* Multi-entry groups */
  .multi-entry {
    margin-bottom: 30px;
  }
  .multi-entry > div {
    margin-bottom: 15px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
  }
</style>
<script>
  // Simple JavaScript to add education and work experience fields dynamically
  function addEducation() {
    const container = document.getElementById('education-container');
    const block = document.createElement('div');
    block.innerHTML = `
      <label>Degree</label>
      <input type="text" name="edu_degree[]" placeholder="e.g. Bachelor of Science in CS" />
      <label>Institution</label>
      <input type="text" name="edu_institution[]" placeholder="University Name" />
      <label>Year</label>
      <input type="text" name="edu_year[]" placeholder="e.g. 2020" />
      <label>Details</label>
      <textarea name="edu_details[]" placeholder="Additional info"></textarea>
    `;
    container.appendChild(block);
  }
  function addWork() {
    const container = document.getElementById('work-container');
    const block = document.createElement('div');
    block.innerHTML = `
      <label>Position</label>
      <input type="text" name="work_position[]" placeholder="e.g. Software Engineer" />
      <label>Company</label>
      <input type="text" name="work_company[]" placeholder="Company Name" />
      <label>Duration</label>
      <input type="text" name="work_duration[]" placeholder="e.g. 2019 - 2023" />
      <label>Responsibilities (one per line)</label>
      <textarea name="work_responsibilities[]" placeholder="Describe your tasks"></textarea>
    `;
    container.appendChild(block);
  }
</script>
</head>
<body>

<h1>Dynamic Resume Generator</h1>

<?php if ($showForm): ?>

    <?php if ($errors): ?>
    <div class="error-list">
        <strong>Please fix the following errors:</strong>
        <ul>
            <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <form method="POST" action="">
        <h2>Personal Information</h2>
        <label for="name">Full Name *</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($personalInfo['name']) ?>" required />

        <label for="title">Job Title *</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($personalInfo['title']) ?>" required />

        <label for="email">Email *</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($personalInfo['email']) ?>" required />

        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($personalInfo['phone']) ?>" />

        <label for="linkedin">LinkedIn</label>
        <input type="text" name="linkedin" id="linkedin" value="<?= htmlspecialchars($personalInfo['linkedin']) ?>" />

        <label for="summary">Professional Summary</label>
        <textarea name="summary" id="summary"><?= htmlspecialchars($personalInfo['summary']) ?></textarea>

        <div class="multi-entry">
            <h2>Education</h2>
            <div id="education-container">
                <!-- Prefill education if any -->
                <?php
                if (!empty($education)) {
                    foreach ($education as $edu) {
                        ?>
                        <div>
                            <label>Degree</label>
                            <input type="text" name="edu_degree[]" value="<?= htmlspecialchars($edu['degree']) ?>" />
                            <label>Institution</label>
                            <input type="text" name="edu_institution[]" value="<?= htmlspecialchars($edu['institution']) ?>" />
                            <label>Year</label>
                            <input type="text" name="edu_year[]" value="<?= htmlspecialchars($edu['year']) ?>" />
                            <label>Details</label>
                            <textarea name="edu_details[]"><?= htmlspecialchars($edu['details']) ?></textarea>
                        </div>
                        <?php
                    }
                } else {
                    // Show one blank block initially
                    ?>
                    <div>
                        <label>Degree</label>
                        <input type="text" name="edu_degree[]" />
                        <label>Institution</label>
                        <input type="text" name="edu_institution[]" />
                        <label>Year</label>
                        <input type="text" name="edu_year[]" />
                        <label>Details</label>
                        <textarea name="edu_details[]"></textarea>
                    </div>
                    <?php
                }
                ?>
            </div>
            <button type="button" onclick="addEducation()">Add Education</button>
        </div>

        <div class="multi-entry">
            <h2>Work Experience</h2>
            <div id="work-container">
                <?php
                if (!empty($workExperience)) {
                    foreach ($workExperience as $job) {
                        ?>
                        <div>
                            <label>Position</label>
                            <input type="text" name="work_position[]" value="<?= htmlspecialchars($job['position']) ?>" />
                            <label>Company</label>
                            <input type="text" name="work_company[]" value="<?= htmlspecialchars($job['company']) ?>" />
                            <label>Duration</label>
                            <input type="text" name="work_duration[]" value="<?= htmlspecialchars($job['duration']) ?>" />
                            <label>Responsibilities (one per line)</label>
                            <textarea name="work_responsibilities[]"><?= implode("\n", array_map('htmlspecialchars', $job['responsibilities'])) ?></textarea>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div>
                        <label>Position</label>
                        <input type="text" name="work_position[]" />
                        <label>Company</label>
                        <input type="text" name="work_company[]" />
                        <label>Duration</label>
                        <input type="text" name="work_duration[]" />
                        <label>Responsibilities (one per line)</label>
                        <textarea name="work_responsibilities[]"></textarea>
                    </div>
                    <?php
                }
                ?>
            </div>
            <button type="button" onclick="addWork()">Add Work Experience</button>
        </div>

        <h2>Skills</h2>
        <label for="skills">Enter skills separated by commas</label>
        <input type="text" name="skills" id="skills" placeholder="PHP, JavaScript, CSS" value="<?= htmlspecialchars(implode(', ', $skills)) ?>" />

        <button type="submit">Generate Resume</button>
    </form>

<?php else: ?>

<header>
    <h1><?= $personalInfo['name'] ?></h1>
    <h2><?= $personalInfo['title'] ?></h2>
    <div class="contact-info">
        <span>Email: <?= $personalInfo['email'] ?></span> |
        <span>Phone: <?= $personalInfo['phone'] ?></span> |
        <span>LinkedIn: <?= $personalInfo['linkedin'] ?></span>
    </div>
</header>

<section>
    <h2>Professional Summary</h2>
    <p><?= nl2br($personalInfo['summary']) ?></p>
</section>

<section>
    <h2>Education</h2>
    <?= formatEducation($education) ?>
</section>

<section>
    <h2>Work Experience</h2>
    <?= formatWorkExperience($workExperience) ?>
</section>

<section>
    <h2>Skills</h2>
    <div class="skills-list">
        <?php foreach ($skills as $skill): ?>
            <div class="skill"><?= $skill ?></div>
        <?php endforeach; ?>
    </div>
</section>

<?php endif; ?>

</body>
</html>
