<?php
return ['provider' => env('AI_PROVIDER', 'anthropic'), 'model' => env('AI_MODEL'),
        'max_tokens_per_session' => 20000, 'design_requires_template' => true];
