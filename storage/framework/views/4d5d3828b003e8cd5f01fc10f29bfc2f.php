

<?php $__env->startSection('content'); ?>

    <div class="max-w-4xl mx-auto py-12 px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold"><?php echo e($user->name); ?> — Portfolio Preview</h1>
            <a href="<?php echo e(route('dashboard')); ?>" class="text-blue-600 hover:underline">← Back to Dashboard</a>
        </div>

        <div class="flex justify-end mb-4 no-print space-x-2">
            <button id="downloadPdfBtn" class="px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">Download
                PDF</button>
            <button id="printBtn"
                class="px-3 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 text-sm">Print</button>
        </div>

        <div id="exportable" class="bg-white shadow rounded-lg overflow-hidden">
            <div class="p-6 border-b">
                <div class="flex items-center gap-6">
                    <div class="w-28 h-28 rounded-full bg-gray-100 overflow-hidden flex items-center justify-center">
                        <?php if(optional($portfolio)->profile_image): ?>
                            <img src="<?php echo e(asset('storage/' . $portfolio->profile_image)); ?>" alt="Profile"
                                class="w-full h-full object-cover">
                        <?php else: ?>
                            <span class="text-gray-400 text-4xl"><?php echo e(strtoupper(substr($user->name, 0, 1))); ?></span>
                        <?php endif; ?>
                    </div>

                    <div>
                        <h2 class="text-2xl font-semibold"><?php echo e($portfolio->title ?? $user->name); ?></h2>
                        <p class="text-gray-600"><?php echo e($portfolio->headline ?? ($user->email ?? '')); ?></p>
                        <div class="mt-2 text-sm text-gray-600">
                            <?php if($portfolio->location): ?>
                                <span><?php echo e($portfolio->location); ?></span> ·
                            <?php endif; ?>
                            <?php if($portfolio->experience_years): ?>
                                <span><?php echo e($portfolio->experience_years); ?> yrs</span> ·
                            <?php endif; ?>
                            <?php if($portfolio->availability): ?>
                                <span><?php echo e($portfolio->availability); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="mt-3 space-x-3">
                            <?php if($portfolio->website): ?>
                                <a href="<?php echo e($portfolio->website); ?>"
                                    class="text-sm text-blue-600 hover:underline">Website</a>
                            <?php endif; ?>
                            <?php if($portfolio->github): ?>
                                <a href="<?php echo e($portfolio->github); ?>" class="text-sm text-blue-600 hover:underline">GitHub</a>
                            <?php endif; ?>
                            <?php if($portfolio->linkedin): ?>
                                <a href="<?php echo e($portfolio->linkedin); ?>"
                                    class="text-sm text-blue-600 hover:underline">LinkedIn</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if($portfolio->bio): ?>
                    <div class="mt-6 text-gray-700"><?php echo e($portfolio->bio); ?></div>
                <?php endif; ?>
            </div>

            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2 space-y-6">
                    
                    <section>
                        <h3 class="text-xl font-semibold mb-3">Experience</h3>

                        <?php $__empty_1 = true; $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="mb-4">
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="font-semibold"><?php echo e($exp->position); ?> <span
                                                class="text-gray-600 font-normal">@ <?php echo e($exp->company); ?></span></h4>
                                        <p class="text-sm text-gray-600"><?php echo e($exp->location); ?></p>
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        <span><?php echo e(\Carbon\Carbon::parse($exp->start_date)->format('M Y')); ?></span>
                                        -
                                        <span><?php echo e($exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Present'); ?></span>
                                    </div>
                                </div>
                                <?php if($exp->description): ?>
                                    <p class="mt-2 text-gray-700 text-sm"><?php echo e($exp->description); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-gray-600">No experience added.</p>
                        <?php endif; ?>
                    </section>

                    
                    <section class="mt-6">
                        <h3 class="text-xl font-semibold mb-3">Education</h3>
                        <?php $__empty_1 = true; $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="mb-4">
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="font-semibold"><?php echo e($edu->level); ?></h4>
                                        <p class="text-sm text-gray-600"><?php echo e($edu->institution); ?> ·
                                            <?php echo e($edu->passing_year ?? ''); ?></p>
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        <span><?php echo e($edu->marks); ?></span>

                                    </div>
                                </div>
                                <?php if($edu->description): ?>
                                    <p class="mt-2 text-gray-700 text-sm"><?php echo e($edu->description); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-gray-600">No education added.</p>
                        <?php endif; ?>
                    </section>

                    
                    <section class="mt-6">
                        <h3 class="text-xl font-semibold mb-3">Skills</h3>
                        <?php if($skills->count()): ?>
                            <div class="flex flex-wrap gap-2">
                                <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span
                                        class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700"><?php echo e($skill->name); ?>

                                        <?php if($skill->proficiency): ?>
                                            · <?php echo e($skill->proficiency); ?>

                                        <?php endif; ?>
                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            <p class="text-gray-600">No skills added.</p>
                        <?php endif; ?>
                    </section>

                </div>

                
                <aside class="space-y-6">
                    <div class="bg-gray-50 p-4 rounded">
                        <h4 class="font-semibold text-gray-700">Contact</h4>
                        <div class="mt-2 text-sm text-gray-600">
                            <?php if($portfolio->phone): ?>
                                <div>Phone: <?php echo e($portfolio->phone); ?></div>
                            <?php endif; ?>
                            <?php if($portfolio->email_public): ?>
                                <div>Email: <?php echo e($portfolio->email_public); ?></div>
                            <?php endif; ?>
                            <?php if($portfolio->country): ?>
                                <div>Country: <?php echo e($portfolio->country); ?></div>
                            <?php endif; ?>
                            <?php if($portfolio->city): ?>
                                <div>City: <?php echo e($portfolio->city); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded">
                        <h4 class="font-semibold text-gray-700">Primary Skills</h4>
                        <div class="mt-2 text-sm text-gray-600">
                            <?php if($portfolio->primary_skill): ?>
                                <div><?php echo e($portfolio->primary_skill); ?></div>
                            <?php endif; ?>
                            <?php if($portfolio->secondary_skill): ?>
                                <div class="text-gray-500"><?php echo e($portfolio->secondary_skill); ?></div>
                            <?php endif; ?>
                            <?php if($portfolio->tools): ?>
                                <div class="mt-2 text-sm text-gray-600">Tools: <?php echo e($portfolio->tools); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded">
                        <h4 class="font-semibold text-gray-700">Availability</h4>
                        <div class="mt-2 text-sm text-gray-600">
                            <?php echo e($portfolio->availability ?? 'Not specified'); ?>

                        </div>
                    </div>
                </aside>

            </div>
        </div>

    </div>

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
        (function() {
            var printBtn = document.getElementById('printBtn');
            var downloadBtn = document.getElementById('downloadPdfBtn');
            var exportEl = document.getElementById('exportable');

            if (printBtn) {
                printBtn.addEventListener('click', function() {
                    window.print();
                });
            }

            if (downloadBtn && exportEl) {
                downloadBtn.addEventListener('click', function() {
                    var opt = {
                        margin: 0.5,
                        filename: 'portfolio-<?php echo e($user->id); ?>.pdf',
                        image: {
                            type: 'jpeg',
                            quality: 0.98
                        },
                        html2canvas: {
                            scale: 2,
                            useCORS: true
                        },
                        jsPDF: {
                            unit: 'in',
                            format: 'letter',
                            orientation: 'portrait'
                        }
                    };
                    html2pdf().set(opt).from(exportEl).save();
                });
            }
        })();
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/UserPortfolio/preview.blade.php ENDPATH**/ ?>