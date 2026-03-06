

<?php $__env->startSection('content'); ?>
    <div class="max-w-6xl mx-auto py-8">

        <?php if(session('success')): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded border border-green-400">
                <p><?php echo e(session('success')); ?></p>
            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded border border-red-400">
                <ul class="list-disc pl-5">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 rounded-lg text-white p-6 shadow-xl mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold">My Portfolio</h1>
                    <p class="mt-1 text-indigo-100">A technical snapshot of your profile and achievements</p>
                </div>
                <div class="text-right">
                    <button onclick="openModal()"
                        class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 px-4 py-2 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5h6m2 0v6M3 3l18 18" />
                        </svg>
                        Edit Portfolio
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-6">
                    <div class="flex flex-col items-center">
                        <div
                            class="w-32 h-32 rounded-full overflow-hidden border-4 border-gradient-to-br from-indigo-500 to-pink-500 mb-4">
                            <?php if($portfolio?->profile_image): ?>
                                <img src="<?php echo e(asset('storage/' . $portfolio->profile_image)); ?>" alt="Profile"
                                    class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                    <span
                                        class="text-4xl text-gray-400"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <h2 class="text-xl font-bold"><?php echo e(auth()->user()->name); ?></h2>
                        <p class="text-sm text-gray-500"><?php echo e($portfolio?->title ?? '—'); ?></p>

                        <div class="mt-4 w-full">
                            <div class="flex flex-wrap gap-2 justify-center">
                                <?php if($portfolio?->primary_skill): ?>
                                    <span
                                        class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-sm"><?php echo e($portfolio->primary_skill); ?></span>
                                <?php endif; ?>
                                <?php if($portfolio?->secondary_skill): ?>
                                    <span
                                        class="px-3 py-1 bg-pink-50 text-pink-700 rounded-full text-sm"><?php echo e($portfolio->secondary_skill); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mt-4 text-sm text-gray-600 text-center">
                            <div>
                                <?php echo e($portfolio?->location ?? ($portfolio?->city . ', ' . $portfolio?->country ?? 'Location not set')); ?>

                            </div>
                            <div class="mt-1"><?php echo e($portfolio?->experience_years ?? 0); ?> yrs •
                                <?php echo e($portfolio?->availability ?? 'N/A'); ?></div>
                        </div>

                        <div class="mt-4 w-full">
                            <div class="grid grid-cols-3 gap-2 text-center text-xs">
                                <div class="p-2 bg-gray-50 rounded">
                                    <div class="font-semibold"><?php echo e($skills_count ?? '—'); ?></div>
                                    <div class="text-gray-400">Skills</div>
                                </div>
                                <div class="p-2 bg-gray-50 rounded">
                                    <div class="font-semibold"><?php echo e($experiences_count ?? '—'); ?></div>
                                    <div class="text-gray-400">Exp.</div>
                                </div>
                                <div class="p-2 bg-gray-50 rounded">
                                    <div class="font-semibold"><?php echo e($educations_count ?? '—'); ?></div>
                                    <div class="text-gray-400">Edu.</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex gap-3">
                            <?php if($portfolio?->website): ?>
                                <a href="<?php echo e($portfolio->website); ?>" target="_blank"
                                    class="text-sm text-indigo-600 hover:underline">Website</a>
                            <?php endif; ?>
                            <?php if($portfolio?->github): ?>
                                <a href="<?php echo e($portfolio->github); ?>" target="_blank"
                                    class="text-sm text-gray-700 hover:underline">GitHub</a>
                            <?php endif; ?>
                            <?php if($portfolio?->linkedin): ?>
                                <a href="<?php echo e($portfolio->linkedin); ?>" target="_blank"
                                    class="text-sm text-blue-700 hover:underline">LinkedIn</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-3">About</h3>
                    <p class="text-gray-700"><?php echo e($portfolio?->bio ?? 'No bio provided.'); ?></p>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500">Contact</h4>
                            <div class="mt-2 text-gray-700 text-sm">
                                <div>Phone: <?php echo e($portfolio?->phone ?? '—'); ?></div>
                                <div>Email: <?php echo e($portfolio?->email_public ?? auth()->user()->email); ?></div>
                                <div>City: <?php echo e($portfolio?->city ?? '—'); ?></div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-semibold text-gray-500">Career & Tools</h4>
                            <div class="mt-2 text-gray-700 text-sm">
                                <div>Headline: <?php echo e($portfolio?->headline ?? '—'); ?></div>
                                <div class="mt-2">Tools: <?php echo e($portfolio?->tools ?? '—'); ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h4 class="text-sm font-semibold text-gray-500">Availability</h4>
                        <p class="mt-2 text-gray-700"><?php echo e($portfolio?->availability ?? 'Not specified'); ?></p>
                    </div>

                </div>

                <div class="mt-6 bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-3">Public Links & Social</h3>
                    <div class="flex flex-wrap gap-3">
                        <?php if($portfolio?->github): ?>
                            <a href="<?php echo e($portfolio->github); ?>"
                                class="px-3 py-2 bg-gray-100 rounded hover:bg-gray-50">GitHub</a>
                        <?php endif; ?>
                        <?php if($portfolio?->linkedin): ?>
                            <a href="<?php echo e($portfolio->linkedin); ?>"
                                class="px-3 py-2 bg-blue-50 rounded hover:bg-blue-100">LinkedIn</a>
                        <?php endif; ?>
                        <?php if($portfolio?->website): ?>
                            <a href="<?php echo e($portfolio->website); ?>"
                                class="px-3 py-2 bg-green-50 rounded hover:bg-green-100">Website</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
    <div id="portfolioModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white w-full max-w-3xl rounded-lg p-6 relative mx-4">
            <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500">✖</button>

            <form method="POST" action="<?php echo e(route('portfolio.profile.update')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="space-y-4">
                    <div class="step" id="step-1">
                        <h2 class="text-xl font-bold">Basic Info</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                            <div>
                                <label class="text-sm font-medium">Professional Title</label>
                                <input class="w-full px-3 py-2 border rounded" name="title"
                                    value="<?php echo e($portfolio?->title); ?>">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Headline</label>
                                <input class="w-full px-3 py-2 border rounded" name="headline"
                                    value="<?php echo e($portfolio?->headline); ?>">
                            </div>
                            <div class="md:col-span-2">
                                <label class="text-sm font-medium">Bio</label>
                                <textarea name="bio" class="w-full px-3 py-2 border rounded"><?php echo e($portfolio?->bio); ?></textarea>
                            </div>
                            <div>
                                <label class="text-sm font-medium">Profile Image</label>
                                <input type="file" name="profile_image" class="w-full">
                            </div>
                            <?php if($portfolio?->profile_image): ?>
                                <div class="flex items-center gap-4 mt-2">
                                    <img src="<?php echo e(asset('storage/' . $portfolio->profile_image)); ?>"
                                        class="w-20 h-20 object-cover rounded">
                                    <div class="text-sm text-gray-500">Current image</div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="step hidden" id="step-2">
                        <h2 class="text-xl font-bold">Profile & Skills</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                            <div>
                                <label class="text-sm font-medium">GitHub</label>
                                <input class="w-full px-3 py-2 border rounded" name="github"
                                    value="<?php echo e($portfolio?->github); ?>">
                            </div>
                            <div>
                                <label class="text-sm font-medium">LinkedIn</label>
                                <input class="w-full px-3 py-2 border rounded" name="linkedin"
                                    value="<?php echo e($portfolio?->linkedin); ?>">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Website</label>
                                <input class="w-full px-3 py-2 border rounded" name="website"
                                    value="<?php echo e($portfolio?->website); ?>">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Primary Skill</label>
                                <input class="w-full px-3 py-2 border rounded" name="primary_skill"
                                    value="<?php echo e($portfolio?->primary_skill); ?>">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Secondary Skill</label>
                                <input class="w-full px-3 py-2 border rounded" name="secondary_skill"
                                    value="<?php echo e($portfolio?->secondary_skill); ?>">
                            </div>
                            <div class="md:col-span-2">
                                <label class="text-sm font-medium">Tools</label>
                                <input class="w-full px-3 py-2 border rounded" name="tools"
                                    value="<?php echo e($portfolio?->tools); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="step hidden" id="step-3">
                        <h2 class="text-xl font-bold">Contact & Location</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                            <div>
                                <label class="text-sm font-medium">Phone</label>
                                <input class="w-full px-3 py-2 border rounded" name="phone"
                                    value="<?php echo e($portfolio?->phone); ?>">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Public Email</label>
                                <input class="w-full px-3 py-2 border rounded" name="email_public"
                                    value="<?php echo e($portfolio?->email_public); ?>">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Country</label>
                                <input class="w-full px-3 py-2 border rounded" name="country"
                                    value="<?php echo e($portfolio?->country); ?>">
                            </div>
                            <div>
                                <label class="text-sm font-medium">City</label>
                                <input class="w-full px-3 py-2 border rounded" name="city"
                                    value="<?php echo e($portfolio?->city); ?>">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Availability</label>
                                <input class="w-full px-3 py-2 border rounded" name="availability"
                                    value="<?php echo e($portfolio?->availability); ?>">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Years Experience</label>
                                <input type="number" class="w-full px-3 py-2 border rounded" name="experience_years"
                                    value="<?php echo e($portfolio?->experience_years); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <button type="button" onclick="prevStep()" class="px-4 py-2 border rounded">Back</button>
                        <div>
                            <button type="button" onclick="nextStep()" id="nextBtn"
                                class="px-4 py-2 bg-indigo-600 text-white rounded">Next</button>
                            <button type="submit" id="submitBtn"
                                class="px-4 py-2 bg-green-600 text-white rounded hidden">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let step = 1;

        function openModal() {
            const el = document.getElementById('portfolioModal');
            el.classList.remove('hidden');
            el.classList.add('flex');
        }

        function closeModal() {
            const el = document.getElementById('portfolioModal');
            el.classList.add('hidden');
            el.classList.remove('flex');
        }

        function showStep() {
            document.querySelectorAll('.step').forEach(s => s.classList.add('hidden'));
            document.getElementById(`step-${step}`).classList.remove('hidden');

            document.getElementById('nextBtn').classList.toggle('hidden', step === 3);
            document.getElementById('submitBtn').classList.toggle('hidden', step !== 3);
        }

        function nextStep() {
            if (step < 3) step++;
            showStep();
        }

        function prevStep() {
            if (step > 1) step--;
            showStep();
        }

        showStep();
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\profile_builder\resources\views/UserPortfolio/profile.blade.php ENDPATH**/ ?>