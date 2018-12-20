#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <time.h>
#include <ctype.h>

#ifdef __WINDOWS
	#include <windows.h>
#endif 

#ifdef __UNIX64
    #include <sys/wait.h>
	#include <sys/syscall.h>
	#include <sys/reg.h>
	#include <fcntl.h>
	#include <unistd.h>
	#include <errno.h>
	#include <signal.h>
#endif 

#define MAX_BUFF_SIZE 		1024

#define PID_FILE			"judger.pid"
#define REDICT_STDIN		"data.in"
#define REDICT_STDOUT		"user.out"
#define REDICT_STDERR		"err.info"

#define DATA_IN 	REDICT_STDIN
#define DATA_OUT	"data.out"
#define USER_OUT	REDICT_STDOUT

#define LAN_CPP 0
#define LAN_C 1
#define LAN_JAVA 3
#define TOTAL_LAN 3

#define OJ_AC 1
#define OJ_WA 2
#define OJ_TLE 3
#define OJ_MLE 4
#define OJ_RE 5
#define OJ_OLE 6
#define OJ_CE 7
#define OJ_SE 8
#define OJ_QU 9
#define OJ_CL 10
#define OJ_RN 11

const char* cmd[] = {
	"g++ -std=c++14 -O2 -w \"%s\" -o \"%s\"",
	"gcc -std=c++11 -O2 -w \"%s\" -o \"%s\"",
	NULL
};

#ifdef __UNIX64
// C and C++
const int ALLOW_SYS_CALL_C[] = {0,1,2,3,4,5,8,9,11,12,20,21,59,63,89,158,231,240, 
	SYS_time, SYS_read, SYS_uname, SYS_write, 
	SYS_open, SYS_close, SYS_execve, SYS_access, 
	SYS_brk, SYS_munmap, SYS_mprotect, SYS_mmap, 
	SYS_fstat, SYS_set_thread_area, 252, SYS_arch_prctl, 0 };
#endif

static void trim(char *str) {
	char buf[MAX_BUFF_SIZE];
	char *start;
	char *end;

	strcpy(buf, str);
	start = buf;
	while((*start) == ' '|| (*start) == '\t' || (*start) == '\n' || (*start) == '\v')
		start++;
	end = start;
	while((*end) != ' ' && (*end) != '\t' && (*end) != '\n' && (*end) != '\v')
		end++;
	end = '\0';
	strcpy(str, start);
}

static int work() {
}

int compile(int lang, const char* cFile, const char* runId)
{
// redirect std I/O 
	//freopen(REDICT_STDIN, "r", stdin);
	freopen(REDICT_STDOUT, "w", stdout);
	freopen(REDICT_STDERR, "a", stderr);

	printf("~~~~~~~~~~~~~\n");

	char buff[MAX_BUFF_SIZE];
	char *cmdline = buff;
	sprintf(cmdline, cmd[0], "b.cpp", "ox");

	printf("%s\n", cmdline);
	const char *cmdd[] = {"g++", "-std=c++11", "b.cpp", "-o", "ox", NULL};
#ifdef __WINDOWS
	system(cmdline);
	WinExec("out.exe",SW_NORMAL);
#elif __UNIX64
	printf("~~~~~~~~~~~~~\n");
	int pid = fork();
	if(pid == 0)
	{
		int err = execl("/home/isolet/ox", "./ox", NULL);
		printf("~~~~~~~~~~~%d-%d\n", err, errno);	
	}
	else if(pid > 0)
	{
		int status;
	    waitpid(pid, &status, 0);
		int err = execvp("g++", (char* const *)cmdd);
	    printf("~~~~~~~~~~~~~%d-%d\n",err, errno);
	}
	//sleep(5);
	
#endif 
	fclose(stdout);
	fclose(stderr);
}

int main(int argc, char const *argv[])
{
	/* code */

	
	return 0;
}
