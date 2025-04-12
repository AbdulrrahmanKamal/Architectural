<?php
// بيانات المشاريع
$projects = [
    [
        'id' => 1,
        'title' => 'فيلا عصرية',
        'architect' => 'أحمد علي',
        'location' => 'دبي، الإمارات',
        'area' => '450 م²',
        'year' => '2023',
        'description' => 'تصميم فيلا عصرية بلمسات تقليدية',
        'image' => 'villa.jpg',
        'image_url' => 'https://cdnassets.hw.net/dims4/GG/f6a91a8/2147483647/resize/850x%3E/quality/90/?url=https%3A%2F%2Fcdnassets.hw.net%2Fab%2Fc1%2Ffc52560248ab8f3d50a8cee6233d%2F42a804f679924d2191e92c7085e10595.jpg',
        'has_details' => true
    ],
    [
        'id' => 2,
        'title' => 'برج سكني',
        'architect' => 'ليا محمد',
        'location' => 'الرياض، السعودية',
        'area' => '12000 م²',
        'year' => '2022',
        'description' => 'برج سكني بتصميم مستدام',
        'image' => 'tower.jpg',
        'image_url' => 'https://s3-eu-west-1.amazonaws.com/content.argaamnews.com/838cb051-2516-447f-9de2-103a0ca91713.jpg',
        'has_details' => false
    ]
];

// بيانات الخدمات
$services = [
    ['title' => 'التصميم المعماري', 'icon' => 'fa-building'],
    ['title' => 'التخطيط الحضري', 'icon' => 'fa-city'],
    ['title' => 'التصميم الداخلي', 'icon' => 'fa-couch'],
    ['title' => 'الاستشارات', 'icon' => 'fa-comments']
];

// معالجة طلب تفاصيل المشروع
if (isset($_GET['project_id'])) {
    $project_id = intval($_GET['project_id']);
    foreach ($projects as $project) {
        if ($project['id'] === $project_id) {
            if ($project['title'] === 'فيلا عصرية') {
                $project['additional_images'] = [
                    "https://cdnassets.hw.net/dims4/GG/ea28f0b/2147483647/resize/850x%3E/quality/90/?url=https%3A%2F%2Fcdnassets.hw.net%2Fa8%2F64%2F814bb84c4d93aa9019d3cdb11d2d%2F373f5b7d45534526927f2ebcf39ab20d.jpg",
                    "https://cdnassets.hw.net/dims4/GG/52d3e65/2147483647/resize/850x%3E/quality/90/?url=https%3A%2F%2Fcdnassets.hw.net%2F08%2F2e%2F3bd2c7834da4a5850d14de187081%2F97ea3dad98834e01a61ca7731dee257e.jpg",
                    "https://cdnassets.hw.net/dims4/GG/3a38849/2147483647/resize/850x%3E/quality/90/?url=https%3A%2F%2Fcdnassets.hw.net%2F0a%2F64%2Ffef6a374470699f4e120b30821cb%2F5db27773d06b42a884fe33b912adf203.jpg"
                ];
                $project['description_details'] = '
                    <h3 class="section-title">التصميم الخارجي</h3>
                    <p>تتميز الفيلا بمزيج متناغم من الحجر والزجاج والمعادن...</p>
                    
                    <h3 class="section-title">العناصر المعمارية</h3>
                    <p>يُركّز التصميم المعماري على الخطوط النظيفة والتصميم البسيط...</p>
                    
                    <h3 class="section-title">تصميم الإضاءة</h3>
                    <p>تلعب الإضاءة دورًا محوريًا في تعزيز جاذبية الفيلا...</p>
                    
                    <h3 class="section-title">تكامل المناظر الطبيعية</h3>
                    <p>تندمج الفيلا بسلاسة مع المناظر الطبيعية المحيطة بها...</p>
                    
                    <h3 class="section-title">المساحات الداخلية</h3>
                    <p>يُولي التصميم الداخلي الأولوية للمساحات المفتوحة...</p>
                ';
            }
            displayProjectDetail($project);
            exit;
        }
    }
    header("Location: index.php");
    exit;
}

// معالجة طلب صفحة المشاريع
if (isset($_GET['page']) && $_GET['page'] === 'projects') {
    displayAllProjects($projects);
    exit;
}

// معالجة طلب صفحة الخدمات
if (isset($_GET['page']) && $_GET['page'] === 'services') {
    displayServices($services);
    exit;
}

// عرض الصفحة الرئيسية
displayHomePage($projects, $services);

// ======= دوال العرض ======= //

function displayHomePage($projects, $services) {
    ?>
    <!DOCTYPE html>
    <html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Architectural - Architectural Vision</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f9f9f9;
                color: #333;
            }
            header {
                background:linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://blog.architizer.com/wp-content/uploads/Heydar-ALiyev-Center-in-Baku_cropped.jpg');
                background-size: cover;
                background-position: center;
                color: RED;
                padding: 100px 50px;
                text-align: center;
            }
            .project-card2 {
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                margin: 20px;
                overflow: hidden;
                transition: transform 0.3s;
                width: 300px;
            }
            .project-card2:hover {
                transform: translateY(-10px);
            }
            .service-box {
                text-align: center;
                padding: 30px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                margin: 10px;
            }
            .service-box i {
                font-size: 2.5rem;
                color: #4CAF50;
                margin-bottom: 15px;
            }
            footer a i {
                font-size: 2.9rem;
                transition: all 0.3s;
            }
            footer a:hover i {
                transform: scale(1.9);
                color: red;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Architectural</h1>
            <p>Architectural Vision of the Future Sustainable Architectural</p>
            <h2><em><a href="#projects" class="button">استكشف المشاريع</a></em></h2>
        </header>
        
        <section id="about" style="padding: 50px 20px; text-align: center;">
            <h2>من نحن</h2>
            <p>نحن فريق مهتم بالتصاميم والمشاريع المعمارية.</p>
        </section>

        <section id="projects" style="padding: 50px 20px; background-color: #f0f0f0;">
            <h2 style="text-align: center;"> المشاريع</h2>
            <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                <?php foreach (array_slice($projects, 0, 3) as $project): ?>
                <div class="project-card2">
                    <img src="<?= $project['image_url'] ?: 'uploads/' . $project['image'] ?>" 
                         alt="<?= $project['title'] ?>" 
                         style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 20px;">
                        <h3><?= $project['title'] ?></h3>
                        <p><?= $project['description'] ?></p>
                        <a href="index.php?project_id=<?= $project['id'] ?>" class="button">المزيد من التفاصيل</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div style="text-align: center; margin-top: 30px;">
                <a href="index.php?page=projects" class="button">عرض جميع المشاريع</a>
            </div>
        </section>

        <section id="services" style="padding: 50px 20px;">
            <h2 style="text-align: center;">خدماتنا</h2>
            <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                <?php foreach ($services as $service): ?>
                <div class="service-box" style="width: 200px;">
                    <i class="fas <?= $service['icon'] ?>"></i>
                    <h3><?= $service['title'] ?></h3>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <footer style="background-color: #333; color: white; text-align: center; padding: 20px;">
            <p>© 2025 Archtact .Abdulrahman Kamal.</p>
            <div style="margin-top: 15px;">
                <big><a href="https://www.instagram.com/abdulrrahmankamal/" target="_blank" style="color: white; margin: 0 10px;">
                    <i class="fab fa-instagram"></i>
                </a></big>
            </div>
        </footer>
    </body>
    </html>
    <?php
}

function displayProjectDetail($project) {
    ?>
    <!DOCTYPE html>
    <html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $project['title'] ?> - Architectural Vision</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f9f9f9;
                color: #333;
            }
            .project-detail-container {
                max-width: 1200px;
                margin: 30px auto;
                padding: 20px;
            }
            .project-header {
                text-align: center;
                margin-bottom: 30px;
            }
            .project-gallery {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                gap: 20px;
                margin: 30px 0;
            }
            .project-gallery img {
                width: 100%;
                height: 250px;
                object-fit: cover;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                transition: transform 0.3s;
            }
            .project-gallery img:hover {
                transform: scale(1.03);
            }
            .section-title {
                color: #4CAF50;
                border-bottom: 2px solid #4CAF50;
                padding-bottom: 10px;
                margin-top: 40px;
            }
            .back-button {
                display: inline-block;
                margin: 20px 0;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            .project-info {
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                margin: 20px 0;
            }
            .info-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 15px;
                margin-top: 20px;
            }
            .info-item {
                margin-bottom: 10px;
            }
            .info-label {
                font-weight: bold;
                color: #4CAF50;
            }
        </style>
    </head>
    <body>
        <div class="project-detail-container">
            <a href="index.php?page=projects" class="back-button">العودة إلى المشاريع</a>
            
            <div class="project-header">
                <h1><?= $project['title'] ?></h1>
                <p><?= $project['description'] ?></p>
            </div>

            <div class="project-info">
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">المعماري:</span> <?= $project['architect'] ?>
                    </div>
                    <div class="info-item">
                        <span class="info-label">الموقع:</span> <?= $project['location'] ?>
                    </div>
                    <div class="info-item">
                        <span class="info-label">المساحة:</span> <?= $project['area'] ?>
                    </div>
                    <div class="info-item">
                        <span class="info-label">سنة التنفيذ:</span> <?= $project['year'] ?>
                    </div>
                </div>
            </div>

            <?php if ($project['title'] === 'فيلا عصرية'): ?>
            <div class="project-gallery">
                <img src="<?= $project['image_url'] ?>" alt="<?= $project['title'] ?>">
                <?php foreach ($project['additional_images'] as $img_url): ?>
                <img src="<?= $img_url ?>" alt="<?= $project['title'] ?>">
                <?php endforeach; ?>
            </div>

            <div class="project-description">
                <?= $project['description_details'] ?>
            </div>
            <?php else: ?>
            <div style="text-align: center;">
                <img src="<?= $project['image_url'] ?: 'uploads/' . $project['image'] ?>" 
                     alt="<?= $project['title'] ?>" 
                     style="max-width: 100%; height: auto; border-radius: 8px;">
                <p style="margin-top: 20px;"><?= $project['description'] ?></p>
            </div>
            <?php endif; ?>
        </div>
    </body>
    </html>
    <?php
}

function displayAllProjects($projects) {
    ?>
    <!DOCTYPE html>
    <html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>جميع المشاريع - Architectural Vision</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f9f9f9;
                color: #333;
            }
            .projects-container {
                max-width: 1200px;
                margin: 30px auto;
                padding: 20px;
            }
            .projects-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 25px;
                margin-top: 30px;
            }
            .project-card {
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                overflow: hidden;
                transition: transform 0.3s;
            }
            .project-card:hover {
                transform: translateY(-10px);
            }
            .project-card img {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }
            .project-card-content {
                padding: 20px;
            }
            .back-button {
                display: inline-block;
                margin: 20px 0;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            h1 {
                text-align: center;
                color: #4CAF50;
            }
        </style>
    </head>
    <body>
        <div class="projects-container">
            <a href="index.php" class="back-button">العودة إلى الصفحة الرئيسية</a>
            <h1>جميع المشاريع</h1>
            
            <div class="projects-grid">
                <?php foreach ($projects as $project): ?>
                <div class="project-card">
                    <img src="<?= $project['image_url'] ?: 'uploads/' . $project['image'] ?>" 
                         alt="<?= $project['title'] ?>">
                    <div class="project-card-content">
                        <h3><?= $project['title'] ?></h3>
                        <p><?= $project['description'] ?></p>
                        <a href="index.php?project_id=<?= $project['id'] ?>" style="color: #4CAF50;">المزيد من التفاصيل</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
    </html>
    <?php
}

function displayServices($services) {
    ?>
    <!DOCTYPE html>
    <html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>خدماتنا - Architectural Vision</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f9f9f9;
                color: #333;
            }
            .services-container {
                max-width: 1200px;
                margin: 30px auto;
                padding: 20px;
            }
            .services-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 25px;
                margin-top: 30px;
            }
            .service-card {
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                padding: 30px;
                text-align: center;
                transition: transform 0.3s;
            }
            .service-card:hover {
                transform: translateY(-10px);
            }
            .service-card i {
                font-size: 2.5rem;
                color: #4CAF50;
                margin-bottom: 15px;
            }
            .back-button {
                display: inline-block;
                margin: 20px 0;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            h1 {
                text-align: center;
                color: #4CAF50;
            }
        </style>
    </head>
    <body>
        <div class="services-container">
            <a href="index.php" class="back-button">العودة إلى الصفحة الرئيسية</a>
            <h1>خدماتنا</h1>
            
            <div class="services-grid">
                <?php foreach ($services as $service): ?>
                <div class="service-card">
                    <i class="fas <?= $service['icon'] ?>"></i>
                    <h3><?= $service['title'] ?></h3>
                    <p>وصف مختصر للخدمة يمكن إضافته هنا</p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>