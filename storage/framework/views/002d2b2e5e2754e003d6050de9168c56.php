<?php $__env->startSection('title', 'Zemen Heliso — Data Analyst Portfolio'); ?>

<?php $__env->startSection('content'); ?>

<section id="hero">
  <div class="hero-grid-bg"></div>
  <div class="hero-glow"></div>
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6 hero-content">
        <div class="hero-eyebrow">Available for projects</div>
        <h1 class="hero-name">
          Hi, I'm<br>
          <span class="highlight">Zemen Heliso</span>
        </h1>
        <p class="hero-title">
          <strong><span id="typedText">Data Analyst</span></strong>
          &nbsp;| Turning Data Into Decisions
        </p>
        <p class="hero-bio">
          Passionate data analyst with expertise in SQL, Excel, Power BI, and Python.
          I transform complex datasets into actionable business insights that drive measurable results.
        </p>
        <div class="hero-stats">
          <div>
            <div class="hero-stat-num" data-target="3" data-suffix="+">0+</div>
            <div class="hero-stat-label">Years Exp.</div>
          </div>
          <div>
            <div class="hero-stat-num" data-target="<?php echo e($projects->count()); ?>" data-suffix="">0</div>
            <div class="hero-stat-label">Projects</div>
          </div>
          <div>
            <div class="hero-stat-num" data-target="<?php echo e($certificates->count()); ?>" data-suffix="">0</div>
            <div class="hero-stat-label">Certificates</div>
          </div>
        </div>
        <div class="d-flex gap-3 flex-wrap">
          <a href="<?php echo e(asset('cv/resume.pdf')); ?>" class="btn-primary-custom" download>
            <i class="bi bi-download"></i> Download CV
          </a>
          <a href="#projects" class="btn-outline-custom">
            <i class="bi bi-grid-3x3-gap"></i> View Projects
          </a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="hero-image-wrap">
          <div class="hero-image-ring"></div>
          <div class="hero-avatar-placeholder">
            <i class="bi bi-person-circle"></i>
          </div>
          
          <div class="badge-float badge-float-1">
            <span class="dot" style="background:var(--accent-cyan)"></span>
            Power BI Expert
          </div>
          <div class="badge-float badge-float-2">
            <span class="dot" style="background:var(--accent-gold)"></span>
            SQL Certified
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="about">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6 fade-up">
        <div class="section-label">About Me</div>
        <h2 class="section-title">Transforming raw data into <em style="color:var(--accent-cyan);font-style:normal">strategic insights</em></h2>
        <div class="section-divider"></div>
        <div class="about-text">
          <p>I'm a dedicated data analyst with a strong foundation in statistical analysis, data visualization, and business intelligence. My work sits at the intersection of data engineering and storytelling — I don't just find patterns, I communicate them clearly to stakeholders at every level.</p>
          <p>Trained through ALX Africa and Udacity programs, I specialize in building dashboards that actually get used, writing SQL queries that run fast, and creating Python notebooks that are clean enough to share.</p>
          <p>When I'm not wrangling data, I contribute to open-source analytics tools and mentor aspiring analysts in the community.</p>
        </div>
        <div class="d-flex gap-3 mt-2">
          <a href="#contact" class="btn-primary-custom"><i class="bi bi-envelope"></i> Let's Talk</a>
          <a href="https://www.linkedin.com/in/zemen-heliso" class="btn-outline-custom" target="_blank">
            <i class="bi bi-linkedin"></i> LinkedIn
          </a>
        </div>
      </div>
      <div class="col-lg-6 fade-up delay-2">
        <div class="section-label">Technical Skills</div>
        <h2 class="section-title mb-4">My Toolkit</h2>
        <div class="skills-wrap">
          <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="skill-item">
            <div class="skill-header">
              <span class="skill-name"><?php echo e($skill->name); ?></span>
              <span class="skill-pct"><?php echo e($skill->percentage); ?>%</span>
            </div>
            <div class="skill-bar">
              <div class="skill-fill" data-pct="<?php echo e($skill->percentage); ?>"></div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="certificates">
  <div class="container">
    <div class="text-center mb-5 fade-up">
      <div class="section-label">Credentials</div>
      <h2 class="section-title">Certificates & Training</h2>
      <div class="section-divider mx-auto"></div>
    </div>
    <div class="row g-4 justify-content-center">
      <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-6 col-lg-5 fade-up delay-<?php echo e($loop->index + 1); ?>">
        <div class="cert-card">
          <div class="cert-icon"><i class="bi bi-patch-check-fill"></i></div>
          <div class="cert-issuer"><?php echo e($cert->issuer); ?></div>
          <h3 class="cert-title"><?php echo e($cert->title); ?></h3>
          <?php if($cert->description): ?><p class="cert-desc"><?php echo e($cert->description); ?></p><?php endif; ?>
          <div class="d-flex align-items-center justify-content-between">
            <div class="cert-date">
              <i class="bi bi-calendar3"></i>
              <?php echo e($cert->issued_date ? $cert->issued_date->format('M Y') : 'Completed'); ?>

            </div>
            <?php if($cert->credential_url): ?>
              <a href="<?php echo e($cert->credential_url); ?>" class="project-link" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i> Verify
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<section id="projects">
  <div class="container">
    <div class="text-center mb-5 fade-up">
      <div class="section-label">Work</div>
      <h2 class="section-title">Featured Projects</h2>
      <div class="section-divider mx-auto"></div>
      <p style="color:var(--text-secondary);max-width:560px;margin:0 auto">
        A selection of real-world data projects demonstrating end-to-end analytical workflows.
      </p>
    </div>
    <div class="row g-4">
      <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-6 col-lg-4 fade-up delay-<?php echo e(($loop->index % 3) + 1); ?>">
        <div class="project-card">
          <div class="project-thumb">
            <?php if($project->thumbnail): ?>
              <img src="<?php echo e($project->thumbnail); ?>" alt="<?php echo e($project->title); ?>">
            <?php else: ?>
              <div class="project-thumb-placeholder"><i class="bi bi-bar-chart-line"></i></div>
            <?php endif; ?>
            <?php if($project->featured): ?>
              <div class="project-featured-badge">⭐ Featured</div>
            <?php endif; ?>
          </div>
          <div class="project-body">
            <h3 class="project-title"><?php echo e($project->title); ?></h3>
            <p class="project-desc"><?php echo e(Str::limit($project->description, 120)); ?></p>
            <?php if($project->technologies): ?>
              <div class="tech-tags">
                <?php $__currentLoopData = is_array($project->technologies) ? $project->technologies : json_decode($project->technologies, true) ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="tech-tag"><?php echo e($tech); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>
            <div class="project-links">
              <?php if($project->github_url): ?>
                <a href="<?php echo e($project->github_url); ?>" class="project-link" target="_blank"><i class="bi bi-github"></i> GitHub</a>
              <?php endif; ?>
              <?php if($project->linkedin_url): ?>
                <a href="<?php echo e($project->linkedin_url); ?>" class="project-link primary" target="_blank"><i class="bi bi-linkedin"></i> Showcase</a>
              <?php endif; ?>
              <?php if($project->live_url): ?>
                <a href="<?php echo e($project->live_url); ?>" class="project-link" target="_blank"><i class="bi bi-box-arrow-up-right"></i> Live</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<section id="contact">
  <div class="container">
    <div class="text-center mb-5 fade-up">
      <div class="section-label">Get In Touch</div>
      <h2 class="section-title">Let's Work Together</h2>
      <div class="section-divider mx-auto"></div>
    </div>
    <div class="row g-5">
      <div class="col-lg-4 fade-up">
        <div class="contact-info-item">
          <div class="contact-icon"><i class="bi bi-telephone"></i></div>
          <div>
            <div class="contact-label">Phone</div>
            <div class="contact-value">+251924594118</div>
          </div>
        </div>
        <div class="contact-info-item">
          <div class="contact-icon"><i class="bi bi-envelope"></i></div>
          <div>
            <div class="contact-label">Email</div>
            <div class="contact-value">helisozemen148@gmail.com</div>
          </div>
        </div>
        <div class="contact-info-item">
          <div class="contact-icon"><i class="bi bi-linkedin"></i></div>
          <div>
            <div class="contact-label">LinkedIn</div>
            <a href="https://www.linkedin.com/in/zemen-heliso" class="contact-value" target="_blank">linkedin.com/in/zemen-heliso</a>
          </div>
        </div>
        <div class="contact-info-item">
          <div class="contact-icon"><i class="bi bi-github"></i></div>
          <div>
            <div class="contact-label">GitHub</div>
            <a href="https://github.com/Zeda-HH" class="contact-value" target="_blank">github.com/Zeda-HH</a>
          </div>
        </div>
      </div>
      <div class="col-lg-8 fade-up delay-2">
        <?php if(session('success')): ?>
          <div class="alert-custom alert-success-custom mb-4 auto-dismiss">
            <i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?>

          </div>
        <?php endif; ?>
        <div class="contact-form-wrap">
          <form action="<?php echo e(route('contact.store')); ?>" method="POST" id="contactForm">
            <?php echo csrf_field(); ?>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="John Doe" value="<?php echo e(old('name')); ?>" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="john@example.com" value="<?php echo e(old('email')); ?>" required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="col-12">
                <label class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Project Inquiry" value="<?php echo e(old('subject')); ?>" required>
                <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="col-12">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="5" placeholder="Tell me about your project..." required><?php echo e(old('message')); ?></textarea>
                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="col-12">
                <button type="submit" class="btn-primary-custom">
                  <i class="bi bi-send"></i> Send Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Zeda\mypp\resources\views/portfolio/index.blade.php ENDPATH**/ ?>