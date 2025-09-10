<?php
/**
 * Podmoduł Branding - Personalizacja marki
 */

if (!defined('ABSPATH')) exit;

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
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white p-4 rounded-lg shadow-modern cursor-pointer hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center min-h-[120px]">
                                    <div class="w-16 h-16 bg-white rounded-lg shadow-modern mb-2"></div>
                                    <span class="text-sm font-medium text-gray-800">Biały</span>
                                </div>
                                <div class="bg-blue-500 p-4 rounded-lg shadow-modern cursor-pointer hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center min-h-[120px]">
                                    <div class="w-16 h-16 bg-blue-500 rounded-lg shadow-modern mb-2"></div>
                                    <span class="text-sm font-medium text-white">Niebieski</span>
                                </div>
                                <div class="bg-green-500 p-4 rounded-lg shadow-modern cursor-pointer hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center min-h-[120px]">
                                    <div class="w-16 h-16 bg-green-500 rounded-lg shadow-modern mb-2"></div>
                                    <span class="text-sm font-medium text-white">Zielony</span>
                                </div>
                                <div class="bg-purple-500 p-4 rounded-lg shadow-modern cursor-pointer hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center min-h-[120px]">
                                    <div class="w-16 h-16 bg-purple-500 rounded-lg shadow-modern mb-2"></div>
                                    <span class="text-sm font-medium text-white">Fioletowy</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-secondary p-6 rounded-modern-lg text-white">
                            <h4 class="text-xl font-semibold mb-3">Logo i grafiki</h4>
                            <p class="opacity-90 mb-4">Prześlij swoje logo i grafiki firmowe</p>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg border border-white/20 cursor-pointer hover:bg-white/20 transition-all duration-300 flex items-center space-x-4 min-h-[100px]">
                                    <div class="w-[18px] h-[18px] bg-white/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-[18px] h-[18px] text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h5 class="font-medium text-white">Prześlij logo</h5>
                                        <p class="text-sm text-white/70">Formaty: PNG, JPG, SVG (max 5MB)</p>
                                    </div>
                                    <svg class="w-[18px] h-[18px] text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg border border-white/20 cursor-pointer hover:bg-white/20 transition-all duration-300 flex items-center space-x-4 min-h-[100px]">
                                    <div class="w-[18px] h-[18px] bg-white/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-[18px] h-[18px] text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-9 0V1m10 3V1m0 3l1 1v16a2 2 0 01-2 2H6a2 2 0 01-2-2V5l1-1z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h5 class="font-medium text-white">Prześlij grafikę</h5>
                                        <p class="text-sm text-white/70">Formaty: PNG, JPG, GIF (max 10MB)</p>
                                    </div>
                                    <svg class="w-[18px] h-[18px] text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="border-2 border-dashed border-gray-300 rounded-modern-lg p-8 text-center hover:border-gray-400 transition-colors">
                            <svg class="w-[18px] h-[18px] text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
