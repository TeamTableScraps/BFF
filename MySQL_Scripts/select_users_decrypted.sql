SELECT 
	user_ID,
	AES_DECRYPT(first_name,'BFF') as first_name,
	AES_DECRYPT(last_name,'BFF') as last_name,
    AES_DECRYPT(email,'BFF') as email,
    AES_DECRYPT(password,'BFF') as password
FROM `users`