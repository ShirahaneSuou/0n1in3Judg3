#include <stdio.h>
#include <mysql.h>

int main(int argc,char *argv[])
{
    MYSQL conn;
    int res;
    mysql_init(&conn);
    printf("~~~~~~~~~~~~~~~~~~~~~~~~~!\n");
    if(mysql_real_connect(&conn,"localhost","root","root","test",0,NULL,CLIENT_FOUND_ROWS))
    {
        printf("connect success!\n");
        res=mysql_query(&conn,"insert into userinfo values('100001', 'shadiao','123456')");
        if(res)
        {
            printf("error\n");
        }
        else
        {
            printf("OK\n");
        }
        mysql_close(&conn);
    }
    return 0;
}
