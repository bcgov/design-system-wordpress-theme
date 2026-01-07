# Patterns Troubleshooting

### Common Issues
1. **Images Not Loading**
   - Verify image path in PHP function 
  
     Example:```<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/bcid_h_rgb_pos.png' ); ?>"```
   - Check image exists in assets folder
   - Confirm proper escaping

2. **Pattern Not Appearing**
   - Verify category assignment
   - Clear cache and rebuild    

3. **Style Inconsistencies**
   - Review block settings
   - Check for custom CSS conflicts
   - Verify theme.json settings

### Tips for adding or updating patterns

- All links should use "#" as the href
- Remove any localhost or production URLs in the href attribute

For additional support or pattern requests, please submit an issue on the GitHub repository.