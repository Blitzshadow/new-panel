<?php
/**
 * Podmoduł Branding - Personalizacja marki
 */

/**
 * Funkcja renderująca sekcję branding
 */
function render_branding_section() {
    ?>
    <section id="branding" class="animate-fadeIn">
        <div class="card hover-lift">
            <div class="card-header section-title">Branding klienta</div>
            <div id="branding-content">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <div class="bg-gradient-primary p-6 rounded-modern-lg text-white">
                            <h4 class="text-xl font-semibold mb-3">Kolorystyka</h4>
                            <p class="opacity-90 mb-4">Dostosuj paletę kolorów swojej marki</p>
                            <div class="grid grid-cols-4 gap-3">
                                <div class="w-12 h-12 bg-white rounded-lg shadow-modern cursor-pointer hover:scale-110 transition-transform"></div>
                                <div class="w-12 h-12 bg-blue-500 rounded-lg shadow-modern cursor-pointer hover:scale-110 transition-transform"></div>
                                <div class="w-12 h-12 bg-green-500 rounded-lg shadow-modern cursor-pointer hover:scale-110 transition-transform"></div>
                                <div class="w-12 h-12 bg-purple-500 rounded-lg shadow-modern cursor-pointer hover:scale-110 transition-transform"></div>
                            </div>
                        </div>

                        <div class="bg-gradient-secondary p-6 rounded-modern-lg text-white">
                            <h4 class="text-xl font-semibold mb-3">Logo i grafiki</h4>
                            <p class="opacity-90">Prześlij swoje logo i grafiki firmowe</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="border-2 border-dashed border-gray-300 rounded-modern-lg p-8 text-center hover:border-gray-400 transition-colors">
                            <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                            <h4 class="text-lg font-semibold text-gray-100 mb-2">Przeciągnij pliki tutaj</h4>
                            <p class="text-gray-400">lub kliknij, aby wybrać</p>
                            <button class="mt-4 btn bg-gradient-primary">Wybierz pliki</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
