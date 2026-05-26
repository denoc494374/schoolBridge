<?php
$host = '127.0.0.1';
$db = 'management_db';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if organization exists
    $stmt = $pdo->query("SELECT COUNT(*) FROM organizations");
    $orgCount = $stmt->fetchColumn();
    
    if ($orgCount == 0) {
        echo "No organizations found. Creating test organization...\n";
        $stmt = $pdo->prepare("INSERT INTO organizations (name, description, email, address, contact_person, phone, website, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->execute(['Test Education Foundation', 'A foundation dedicated to providing scholarships', 'testorg@example.com', '123 Main Street, Manila', 'John Doe', '02-1234-5678', 'https://example.com', 'verified']);
        $orgId = $pdo->lastInsertId();
        echo "Organization created with ID: $orgId\n";
    } else {
        $stmt = $pdo->query("SELECT id FROM organizations LIMIT 1");
        $orgId = $stmt->fetchColumn();
        echo "Using existing organization ID: $orgId\n";
    }
    
    // Check scholarships count
    $stmt = $pdo->query("SELECT COUNT(*) FROM scholarships");
    $scholarshipCount = $stmt->fetchColumn();
    echo "Current scholarships count: $scholarshipCount\n";
    
    if ($scholarshipCount == 0) {
        echo "\nInserting test scholarships...\n";
        
        $scholarships = [
            [
                'title' => 'Engineering Excellence Scholarship',
                'description' => 'A prestigious scholarship for outstanding engineering students pursuing a career in technology and innovation.',
                'slots' => 5,
                'deadline' => date('Y-m-d H:i:s', strtotime('+3 months')),
                'eligibility' => json_encode([
                    'locations' => ['Manila', 'Cebu', 'Davao'],
                    'courses' => ['Computer Science', 'Civil Engineering', 'Electrical Engineering'],
                    'year_levels' => ['Second Year', 'Third Year'],
                    'income_brackets' => ['Low Income', 'Middle Income'],
                    'min_gpa' => 3.5,
                ])
            ],
            [
                'title' => 'Health Sciences Merit Award',
                'description' => 'Supporting the next generation of healthcare professionals with comprehensive financial aid.',
                'slots' => 3,
                'deadline' => date('Y-m-d H:i:s', strtotime('+2 months')),
                'eligibility' => json_encode([
                    'locations' => ['Manila', 'Quezon City', 'Makati'],
                    'courses' => ['Medicine', 'Nursing', 'Public Health'],
                    'year_levels' => ['First Year', 'Second Year'],
                    'income_brackets' => ['Low Income'],
                    'min_gpa' => 3.8,
                ])
            ],
            [
                'title' => 'Business Leaders Tomorrow',
                'description' => 'Invest in future business leaders with our comprehensive scholarship program.',
                'slots' => 4,
                'deadline' => date('Y-m-d H:i:s', strtotime('+4 months')),
                'eligibility' => json_encode([
                    'locations' => ['National', 'All regions'],
                    'courses' => ['Business Administration', 'Commerce', 'Finance'],
                    'year_levels' => ['Second Year', 'Third Year', 'Fourth Year'],
                    'income_brackets' => ['Low Income', 'Middle Income', 'High Income'],
                    'min_gpa' => 3.0,
                ])
            ],
            [
                'title' => 'STEM Innovation Grant',
                'description' => 'Supporting innovative research and development in science, technology, engineering, and mathematics.',
                'slots' => 6,
                'deadline' => date('Y-m-d H:i:s', strtotime('+5 months')),
                'eligibility' => json_encode([
                    'locations' => ['Manila', 'Caloocan', 'Las Piñas'],
                    'courses' => ['Physics', 'Chemistry', 'Biology', 'Mathematics'],
                    'year_levels' => ['Third Year', 'Fourth Year'],
                    'income_brackets' => ['Low Income', 'Middle Income'],
                    'min_gpa' => 3.7,
                ])
            ]
        ];
        
        $stmt = $pdo->prepare("INSERT INTO scholarships (organization_id, title, description, slots, eligibility_criteria, deadline, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
        
        foreach ($scholarships as $scholarship) {
            $stmt->execute([
                $orgId,
                $scholarship['title'],
                $scholarship['description'],
                $scholarship['slots'],
                $scholarship['eligibility'],
                $scholarship['deadline'],
                'open'
            ]);
        }
        
        echo "Successfully inserted " . count($scholarships) . " scholarships!\n";
    }
    
    // Verify
    $stmt = $pdo->query("SELECT COUNT(*) FROM scholarships WHERE status = 'open' AND deadline > NOW()");
    $openCount = $stmt->fetchColumn();
    echo "\nTotal open scholarships with future deadlines: $openCount\n";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
