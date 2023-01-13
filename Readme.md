Short codes:
 - `which_stream`
    - Attributes: `is_a = null, is_b = null`
    - Displays value of `is_a` if delegate's "Stream preference" is "A"; displays value of `is_b` if delegate's "Stream preference" is "B"
 - `generic_timetable`
    - Returns generic timetable according to whether delegate is an online or in-person delegate. Timetable information is stored in `./timetables/`
 - `is_online`
    - Attributes: `online_true = null, online_false = null`
    - Returns value of online_true or online_false depending whether delegate is an online or in-person delegate.

## Example usage:
```
[which_stram is_a="I am a" is_b="I am b"]
```
Can also type html and css code as attribute values in shortcode

