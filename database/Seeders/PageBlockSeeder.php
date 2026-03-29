<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageBlock;
use Illuminate\Database\Seeder;

class PageBlockSeeder extends Seeder
{
    /**
     * Run the database seeds of pages and related blocks.
     *
     * @return void
     */
    public function run()
    {
        $schemas = [
            '/' => [
                'header' => [
                    //
                ],
                'hero-section' => [
                    'title' => [
                        'type' => 'text',
                        'value' => 'Checkpoint Daily',
                    ],
                    'sub-title' => [
                        'type' => 'text',
                        'value' => 'Games, culture, releases, and industry shifts worth your attention.',
                    ],
                    'latest-news' => [
                        'type' => 'text',
                        'value' => 'Latest News',
                    ],
                    'category-1-name' => [
                        'type' => 'text',
                        'value' => 'Industry',
                    ],
                    'category-1-title' => [
                        'type' => 'text',
                        'value' => 'Strategy shifts, studio bets, and the business stories defining the year.',
                    ],
                    'category-1-text' => [
                        'type' => 'text',
                        'value' => 'The biggest industry moves rarely look dramatic at first. We track the deals, resets, and executive calls that change what gets made next.',
                    ],
                    'category-2-name' => [
                        'type' => 'text',
                        'value' => 'PC',
                    ],
                    'category-2-title' => [
                        'type' => 'text',
                        'value' => 'Performance, mods, ports, and the configuration wars.',
                    ],
                    'category-3-name' => [
                        'type' => 'text',
                        'value' => 'Xbox',
                    ],
                    'category-3-title' => [
                        'type' => 'text',
                        'value' => 'Game Pass pressure, platform pacing, and the long view.',
                    ],
                    'category-4-name' => [
                        'type' => 'text',
                        'value' => 'PlayStation',
                    ],
                    'category-4-title' => [
                        'type' => 'text',
                        'value' => 'Prestige releases, ecosystem updates, and audience retention.',
                    ],
                    'see-all-budge' => [
                        'type' => 'text',
                        'value' => 'Archive',
                    ],
                    'see-all-link' => [
                        'type' => 'text',
                        'value' => 'See All News',
                    ],
                    'see-all-text' => [
                        'type' => 'text',
                        'value' => 'Jump to the full stream of headlines, updates, reviews, and platform coverage.',
                    ],
                ],
                'about-us-section' => [
                    'title' => [
                        'type' => 'text',
                        'value' => 'About Us',
                    ],
                    'content' => [
                        'type' => 'editor',
                        'value' => '<p>Checkpoint Daily is an independent game publication covering launches, esports, platform updates, and long-form analysis.We focus on accurate reporting, clean writing, and practical player-focused context.</p>',
                    ],
                ],
                'features-section' => [
                    'title' => [
                        'type' => 'text',
                        'value' => 'Features',
                    ],
                    'content' => [
                        'type' => 'editor',
                        'value' => '<ul><li>Daily headline digest across PC, console, and mobile.</li><li>Weekend deep dives into design, balance, and monetization trends.</li><li>Hands-on previews and benchmark-backed hardware guides.</li></ul>',
                    ],
                ],
                'authors-section' => [
                    'title' => [
                        'type' => 'text',
                        'value' => 'Authors',
                    ],
                    'content' => [
                        'type' => 'editor',
                        'value' => '',
                    ],
                ],
                'contact-section' => [
                    'title' => [
                        'type' => 'text',
                        'value' => 'Contact',
                    ],
                    'content' => [
                        'type' => 'editor',
                        'value' => '<p>For press inquiries, story tips, partnerships, or corrections, visit our dedicated contact page.</p>',
                    ],
                    'cta' => [
                        'type' => 'text',
                        'value' => 'Go to Contact Us page',
                    ],
                ],
                'latest-news-section' => [
                    'title' => [
                        'type' => 'text',
                        'value' => 'Latest News',
                    ],
                    'sub-title' => [
                        'type' => 'text',
                        'value' => 'Live updates and editor picks covering the stories shaping the week.',
                    ],
                    'updated' => [
                        'type' => 'text',
                        'value' => 'Updated',
                    ],
                    'see-all-news' => [
                        'type' => 'text',
                        'value' => 'See All News',
                    ],
                ],
                'footer' => [
                    'text' => [
                        'type' => 'text',
                        'value' => '7grandsteps delivers concise, credible game coverage built for readers who want signal over noise.',
                    ],
                ],
            ],
            'contact' => [
                'header' => [
                    'title' => [
                        'type' => 'text',
                        'value' => 'Contact Us',
                    ],
                    'text' => [
                        'type' => 'editor',
                        'value' => 'Questions, corrections, sponsorship requests, or tips? Send us a message and our editorial team will respond.',
                    ],
                ],
                'form' => [
                    'cta' => [
                        'type' => 'text',
                        'value' => 'Send Message',
                    ],
                ],
                'wait' => [
                    'content' => [
                        'type' => 'editor',
                        'value' => '<p>Response time depends on request type and current queue volume. Typical windows are:</p><ul class="contact-wait-list"><li><strong>Corrections and factual issues:</strong> usually within 24 hours.</li><li><strong>Press and partnership requests:</strong> usually within 2 to 3 business days.</li><li><strong>General feedback and tips:</strong> usually within 3 to 5 business days.</li></ul>',
                    ],
                ],
            ],
        ];

        foreach ($schemas as $pageLink => $blocks) {
            $pageModel = Page::where('link', $pageLink)->firstOrFail();

            foreach ($blocks as $blockName => $block) {
                PageBlock::updateOrCreate(
                    [
                        'page_id' => $pageModel->id,
                        'name' => $blockName,
                    ],
                    [
                        'data' => $block,
                    ]
                );
            }
        }
    }
}
