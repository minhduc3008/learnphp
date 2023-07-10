1. ### Lấy ra tất cả user có giới tính là nữ:

    SELECT * FROM users WHERE gender = 2;

2. ### Lấy ra tất cả các user có giới tính là nam:

    SELECT * FROM users WHERE gender = 1;

3. ### Lấy ra tất cả user có giới tính là nữ và thuộc hộ gia đình có ID là 1:

    SELECT * FROM users WHERE gender = 2 AND family_id = 1;

4. ### Lấy ra tất cả user có giới tính là Nam và thuộc hộ gia đình có ID là 1:

    SELECT * FROM users WHERE gender = 1 AND family_id = 1;

5. ### Lấy ra những user có ngày sinh vào ngày 17-10-2000:

    SELECT * FROM users WHERE birthday = '2000-10-17';

6. ### Lấy ra những gia đình có 2 thành viên trở lên:

    SELECT id FROM families GROUP BY id HAVING COUNT(*) >= 2;

7. ### Lấy ra những gia đình ko có thành viên nào:

    SELECT id FROM families GROUP BY id HAVING COUNT(*) = 0;

8. ### Lấy ra những gia đình có con sinh ngày 20-10-2000:

    SELECT name FROM families WHERE id IN (select family_id from users where birthday = ‘2000-10-20’);

9. ### Lấy ra những gia đình có con là nữ:

    SELECT * FROM families WHERE id IN (SELECT family_id FROM users WHERE gender = 2 );

10. ### Lấy ra những gia đình có con là Nam:

    SELECT * FROM families WHERE id IN (SELECT family_id FROM users WHERE gender = 1 );

11. ### Lấy ra những user thuộc từ 2 team trở lên:

    SELECT user_id FROM user_groups GROUP BY user_id HAVING COUNT(DISTINCT group_id) >= 2;

12. ### Lấy ra những user không thuộc team nào:

    SELECT user_id FROM user_groups GROUP BY user_id HAVING COUNT(DISTINCT group_id) = 0;

13. ### Lấy ra những team chỉ có thành là nữ:

    SELECT group_id FROM user_groups where group_id in (select id from users where gender = 2);

14. ### Lấy ra những team chỉ có thành là Nam:

    SELECT group_id FROM user_groups where group_id in (select id from users where gender = 1);

15. ### Lấy ra danh sách hộ gia đình và số thành viên tương ứng của hộ gia đình đó:

    SELECT family_name, COUNT(family_id) AS sothanhvien FROM families LEFT JOIN users ON families.id = users.family_id GROUP BY family_name;